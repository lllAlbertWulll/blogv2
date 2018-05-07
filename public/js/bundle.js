+function (e) {
    var t = jQuery("body"), o = "2.1.7", r = jQuery("#commentform"), a = jQuery("#cancel-comment-reply-link"),
        n = a.text();
    jQuery(document).on("submit", "#commentform", function () {
        var e = jQuery(this);
        jQuery.ajax({
            url: PUMA.ajax_url,
            data: e.serialize() + "&action=ajax_comment",
            type: e.attr("method"),
            beforeSend: addComment.createButterbar("提交中...."),
            error: function (e) {
                var t = addComment;
                t.createButterbar(e.responseText)
            },
            success: function (e) {
                jQuery("textarea").each(function () {
                    this.value = ""
                });
                var t = addComment, o = t.I("cancel-comment-reply-link"), r = t.I("wp-temp-form-div"),
                    a = t.I(t.respondId), n = t.I("comment_post_ID").value, i = t.I("comment_parent").value;
                if (i != "0") {
                    jQuery("#respond").before('<ol class="children">' + e + "</ol>")
                } else if (!jQuery(".commentlist").length) {
                    jQuery("#respond").before('<ol class="commentlist">' + e + "</ol>")
                } else {
                    jQuery(".commentlist").append(e)
                }
                t.createButterbar("提交成功");
                o.style.display = "none";
                o.onclick = null;
                t.I("comment_parent").value = "0";
                if (r && a) {
                    r.parentNode.insertBefore(a, r);
                    r.parentNode.removeChild(r)
                }
            }
        });
        return false
    });
    addComment = {
        moveForm: function (e, t, o) {
            var r = this, i, s = r.I(e), c = r.I(o), m = r.I("cancel-comment-reply-link"), l = r.I("comment_parent"),
                d = r.I("comment_post_ID");
            a.text(n);
            r.respondId = o;
            if (!r.I("wp-temp-form-div")) {
                i = document.createElement("div");
                i.id = "wp-temp-form-div";
                i.style.display = "none";
                c.parentNode.insertBefore(i, c)
            }
            !s ? (temp = r.I("wp-temp-form-div"), r.I("comment_parent").value = "0", temp.parentNode.insertBefore(c, temp), temp.parentNode.removeChild(temp)) : s.parentNode.insertBefore(c, s.nextSibling);
            jQuery("body").animate({scrollTop: jQuery("#respond").offset().top - 180}, 400);
            l.value = t;
            m.style.display = "";
            m.onclick = function () {
                var e = addComment, t = e.I("wp-temp-form-div"), o = e.I(e.respondId);
                e.I("comment_parent").value = "0";
                if (t && o) {
                    t.parentNode.insertBefore(o, t);
                    t.parentNode.removeChild(t)
                }
                this.style.display = "none";
                this.onclick = null;
                return false
            };
            try {
                r.I("comment").focus()
            } catch (u) {
            }
            return false
        }, I: function (e) {
            return document.getElementById(e)
        }, clearButterbar: function (e) {
            if (jQuery(".butterBar").length > 0) {
                jQuery(".butterBar").remove()
            }
        }, createButterbar: function (e) {
            var t = this;
            t.clearButterbar();
            jQuery("body").append('<div class="butterBar butterBar--center"><p class="butterBar-message">' + e + "</p></div>");
            setTimeout("jQuery('.butterBar').remove()", 3e3)
        }
    };
    window.addComment = addComment;
    e(window).scroll(function () {
        var t = e(this).scrollTop(), o = e(".back-to-top");
        if (t > 200) {
            o.removeClass("u-hide")
        } else {
            o.addClass("u-hide")
        }
    });
    var i = function () {
        jQuery("html,body").animate({scrollTop: 0}, 800)
    };
    window.backToTop = i;
    jQuery(document).on("click", ".termlike", function () {
        var e = jQuery(this);
        if (e.hasClass("is-active")) {
            alert("您已经赞过啦")
        } else {
            e.addClass("is-active");
            jQuery.ajax({
                url: PUMA.ajax_url, data: e.data(), type: "POST", dataType: "json", success: function (t) {
                    if (t.status === 200) {
                        e.find(".count").html(t.data)
                    } else {
                        alert("服务器正在努力找回自我")
                    }
                }
            })
        }
    });
    jQuery(document).on("click", ".share-icons span", function () {
        var e = jQuery(this), t = e.data("type"), o = e.parent(), r = o.data("title"), a = o.data("url"),
            n = o.data("thumb"),
            i = ["toolbar=0,status=0,resizable=1,width=640,height=560,left=", (screen.width - 640) / 2, ",top=", (screen.height - 560) / 2].join(""),
            s;
        switch (t) {
            case"weibo":
                s = "http://service.weibo.com/share/share.php?title=" + r + "&appkey=2313279544&url=" + a;
                window.open(s, "分享", i);
                break;
            case"twitter":
                s = "http://twitter.com/share?text=" + r + "&url=" + a;
                window.open(s, "分享", i);
                break;
            case"wechat":
                s = "http://qr.liantu.com/api.php?text=" + a;
                window.open(s, "分享", i);
                break
        }
        return false
    });
    jQuery(document).on("click", ".opensearch", function () {
        var e = jQuery(this), t = jQuery(".search-form");
        if (t.hasClass("is-active")) {
            t.removeClass("is-active")
        } else {
            t.addClass("is-active")
        }
    });
    var s = document.querySelectorAll(".zoomImg");
    var c = s.length;
    var m = 0;
    e(document).on("click", ".zoomImg", function (o) {
        o.preventDefault();
        var r = e(this);
        var a = r.attr("href");
        var n = e(".zoomImg");
        var i = e(".zoomImg").index(this);
        m = i;
        var s = '<nav class="zoomNav">';
        n.each(function (e) {
            var t = i == e ? " is-active" : "";
            s += '<span class="zoomNav-item' + t + '"></span>'
        });
        s += "</nav>";
        var c = '<button class="zoomImgPre"><</button><button class="zoomImgNext">></button>';
        var d = '<div class="overlay"><div class="overlay-imgs-wrap"><button class="zoomImgClose">x</button>' + c + '<imgs class="overlay-image">' + s + "</div></div>";
        t.append(d);
        p(a);
        window.addEventListener("scroll", v);
        window.addEventListener("keyup", l)
    });
    e(document).on("click", ".zoomImgNext", u);
    e(document).on("click", ".zoomImgPre", d);
    e(document).on("click", ".zoomNav-item", function () {
        var t = e(this).index();
        var o = e(".zoomImg").eq(t).attr("href");
        e(".zoomNav-item").removeClass("is-active");
        e(this).addClass("is-active");
        p(o)
    });
    e(document).on("click", ".zoomImgClose", v);

    function l(e) {
        if (e.keyCode == 39) {
            u()
        } else if (e.keyCode == 37) {
            d()
        } else if (e.keyCode == 27) {
            v()
        }
    }

    function d() {
        if (m > 0) {
            m = m - 1;
            e(".zoomNav-item").removeClass("is-active");
            document.querySelectorAll(".zoomNav-item")[m].classList.add("is-active");
            p(s[m].getAttribute("href"))
        }
    }

    function u() {
        if (m < c - 1) {
            m = m + 1;
            e(".zoomNav-item").removeClass("is-active");
            document.querySelectorAll(".zoomNav-item")[m].classList.add("is-active");
            p(s[m].getAttribute("href"))
        }
    }

    function v() {
        e(".overlay").remove();
        window.removeEventListener("scroll", v);
        window.removeEventListener("keyup", l)
    }

    function p(t) {
        var o = new Image;
        o.onload = function () {
            var r = o.width, a = o.height, n = window.innerHeight - 140, i = window.innerWidth - 80;
            console.log(n);
            if (r > i) {
                a = a * (i / r);
                r = i;
                if (a > n) {
                    r = r * (n / a);
                    a = n
                }
            } else if (a > n) {
                r = r * (n / a);
                a = n;
                if (r > i) {
                    a = a * (i / r);
                    r = i
                }
            }
            e(".overlay-image").attr("src", t).css({width: r, height: a})
        };
        o.src = t
    }
}(jQuery);