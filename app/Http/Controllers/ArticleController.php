<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticlePost;
use Auth;
use App\Http\Requests\StoreArticlePost;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->middleware('auth');
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->findArticleIndex();
        return view('admin.article.index', compact('articles'));
    }

    public function add()
    {
        return view('admin.article.add');
    }

    public function store(StoreArticlePost $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'title' => $request->post('title'),
            'subtitle' => $request->post('subtitle'),
            'page_image' => $request->file('page_image')->store('/uploads/'.date('Y-m-d', time())),
            'content' => $request->post('content'),
            'published_at' => date('Y-m-d H:i:s', strtotime($request->post('published_at')))
        ];
        $keywords = $this->articleRepository->normalizeKeyword($request->post('keywords'));
        $tags = $this->articleRepository->normalizeTag($request->post('tags'));
        $article = $this->articleRepository->createArticle($data);

        $article->keywords()->attach($keywords);
        $article->tags()->attach($tags);

        return redirect('/admin/article/index');
    }

    public function edit($id)
    {
        $article = $this->articleRepository->findSingleById($id);
        return view('admin.article.edit', compact('article'));
    }

    public function update(UpdateArticlePost $request, $id)
    {
        $article = $this->articleRepository->findSingleById($id);
        $data = [
            'title' => $request->post('title'),
            'subtitle' => $request->post('subtitle'),
            'content' => $request->post('content'),
            'published_at' => date('Y-m-d H:i:s', strtotime($request->post('published_at')))
        ];

        if ($request->file('page_image') != null) {
            $data['page_image'] = $request->file('page_image')->store('/uploads/'.date('Y-m-d', time()));
        }

        $keywords = $this->articleRepository->normalizeKeyword($request->post('keywords'));
        $tags = $this->articleRepository->normalizeTag($request->post('tags'));
        $article->update($data);

        $article->keywords()->sync($keywords);
        $article->tags()->sync($tags);

        return redirect('/admin/article/index');
    }

    public function delete($id)
    {
        $this->articleRepository->deleteById($id);
        return redirect('/admin/article/index');
    }

    public function trash()
    {
        $articles = $this->articleRepository->findArticleTrash();
        return view('admin.article.trash', compact('articles'));
    }

    public function recovery($id)
    {
        $this->articleRepository->recoveryById($id);
        return redirect('/admin/article/trash');
    }

    public function destroy($id)
    {
        $this->articleRepository->destroyById($id);
        return redirect('/admin/article/trash');
    }
}
