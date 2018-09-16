<html>
<head>
<meta charset="utf-8">
    <style>
        textarea {
            height: 80vh !important;
            width: 100vw !important;
        }

        body {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
            font-family: sans-serif;
        }

        input[type="text"] {
            width: 100%;
        }

        textarea, input[type="text"] {
            font-size: 1rem;
            line-height: 1.4;
            font-family: sans-serif;
            padding: 10px;
        }

        button {
            background: #6cb2eb;
            color: #fff;
            padding: 15px 80px;
            font-size: 1.2rem;
        }

        div {
            margin-bottom: 10px;
            margin-top: 40px;
        }
        img {
            max-width: 100%;
            width: 200px;
        }
    </style>
</head>
<body>
    <div id="app">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST" class="mb-4">   
            @csrf 
            <div>
                <input name="id" hidden="true" value="{{ $post-> id}}">
            </div>
            <div>
                <input name="title" type="text" v-model="post.title" v-on:keyup="updatePreview">
            </div>
            <div>
                <textarea name="body" v-html="post.body" v-model="post.body" v-on:keyup="updatePreview"></textarea>
            </div>
            <div>
                <label for="published">Draft</label>
                <input name="published" type="radio" value="0" id="published">
                <label for="published">Published</label>
                <input checked="checked" name="published" type="radio" value="1" id="published">
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
        </form>
        <div class="mt-3 mb-4">
            <a  href="/posts/{{ $post->id }}/destroy">Delete Post</a>
        </div>
        @foreach($post->images as $image)
        <div class="mt-3" style="display: flex;">
            
            @component('components.image', ['image' => $image])
            @endcomponent
            
            <div class="mt-3" style="width: 50%;">
                <textarea  onclick="this.focus();this.select()" readonly="readonly" style="height: 100px !important;font-size: 12px !important; line-height: 1 !important;">
                    @component('components.image', ['image' => $image])
                    @endcomponent
                </textarea>
            </div>
        </div>
    @endforeach
</div>
        <script defer="" src="data:text/javascript;base64,InVzZSBzdHJpY3QiO3ZhciBkPU9iamVjdC5hc3NpZ258fGZ1bmN0aW9uKGUpe2Zvcih2YXIgdD0xO3Q8YXJndW1lbnRzLmxlbmd0aDt0Kyspe3ZhciByPWFyZ3VtZW50c1t0XTtmb3IodmFyIGEgaW4gcilPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwocixhKSYmKGVbYV09clthXSl9cmV0dXJuIGV9LHlhbGw9ZnVuY3Rpb24oZSl7dmFyIGE9ZnVuY3Rpb24oYSl7aWYoIklNRyI9PT1hLnRhZ05hbWUpe3ZhciBlPWEucGFyZW50Tm9kZTtpZigiUElDVFVSRSI9PT1lLnRhZ05hbWUmJltdLnNsaWNlLmNhbGwoZS5xdWVyeVNlbGVjdG9yQWxsKCJzb3VyY2UiKSkuZm9yRWFjaChmdW5jdGlvbihlKXtyZXR1cm4gdChlKX0pLCEwPT09bi5hc3luY0RlY29kZVN1cHBvcnQmJiEwPT09bi5yZXBsYWNlV2l0aFN1cHBvcnQpe3ZhciBvPW5ldyBJbWFnZTt0KG8sYSksby5kZWNvZGUoKS50aGVuKGZ1bmN0aW9uKCl7Zm9yKHZhciBlPTA7ZTxhLmF0dHJpYnV0ZXMubGVuZ3RoO2UrKyl7dmFyIHQ9YS5hdHRyaWJ1dGVzW2VdLm5hbWUscj1hLmF0dHJpYnV0ZXNbZV0udmFsdWU7LTE9PT1uLmlnbm9yZWRJbWdBdHRyaWJ1dGVzLmluZGV4T2YodCkmJm8uc2V0QXR0cmlidXRlKHQscil9YS5yZXBsYWNlV2l0aChvKX0pfWVsc2UgdChhKX0iVklERU8iPT09YS50YWdOYW1lJiYoW10uc2xpY2UuY2FsbChhLnF1ZXJ5U2VsZWN0b3JBbGwoInNvdXJjZSIpKS5mb3JFYWNoKGZ1bmN0aW9uKGUpe3JldHVybiB0KGUpfSksYS5sb2FkKCkpLCJJRlJBTUUiPT09YS50YWdOYW1lJiYoYS5zcmM9YS5kYXRhc2V0LnNyYyxhLnJlbW92ZUF0dHJpYnV0ZSgiZGF0YS1zcmMiKSksYS5jbGFzc0xpc3QuY29udGFpbnMoaS5sYXp5QmFja2dyb3VuZENsYXNzKSYmKGEuY2xhc3NMaXN0LnJlbW92ZShpLmxhenlCYWNrZ3JvdW5kQ2xhc3MpLGEuY2xhc3NMaXN0LmFkZChpLmxhenlCYWNrZ3JvdW5kTG9hZGVkKSl9LHQ9ZnVuY3Rpb24oZSl7dmFyIHQ9KDE8YXJndW1lbnRzLmxlbmd0aCYmdm9pZCAwIT09YXJndW1lbnRzWzFdJiZhcmd1bWVudHNbMV0pLmRhdGFzZXR8fGUuZGF0YXNldDtmb3IodmFyIHIgaW4gdCktMSE9PW4uYWNjZXB0ZWREYXRhQXR0cmlidXRlcy5pbmRleE9mKCJkYXRhLSIrcikmJihlLnNldEF0dHJpYnV0ZShyLHRbcl0pLGUucmVtb3ZlQXR0cmlidXRlKCJkYXRhLSIrcikpfSxyPWZ1bmN0aW9uIHlhbGxCYWNrKCl7dmFyIGU9ITE7ITE9PT1lJiYwPGwubGVuZ3RoJiYoZT0hMCxzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7bC5mb3JFYWNoKGZ1bmN0aW9uKHQpe3QuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkudG9wPD13aW5kb3cuaW5uZXJIZWlnaHQraS50aHJlc2hvbGQmJnQuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkuYm90dG9tPj0taS50aHJlc2hvbGQmJiJub25lIiE9PWdldENvbXB1dGVkU3R5bGUodCkuZGlzcGxheSYmKCEwPT09aS5pZGx5TG9hZCYmITA9PT1uLmlkbGVDYWxsYmFja1N1cHBvcnQ/cmVxdWVzdElkbGVDYWxsYmFjayhmdW5jdGlvbigpe2EodCl9LGMpOmEodCksdC5jbGFzc0xpc3QucmVtb3ZlKGkubGF6eUNsYXNzKSxsPWwuZmlsdGVyKGZ1bmN0aW9uKGUpe3JldHVybiBlIT09dH0pKX0pLGU9ITEsMD09PWwubGVuZ3RoJiYhMT09PWkub2JzZXJ2ZUNoYW5nZXMmJm4uZXZlbnRzVG9CaW5kLmZvckVhY2goZnVuY3Rpb24oZSl7cmV0dXJuIGVbMF0ucmVtb3ZlRXZlbnRMaXN0ZW5lcihlWzFdLHlhbGxCYWNrKX0pfSxpLnRocm90dGxlVGltZSkpfSxvPW5ldyBJbWFnZSxuPXtpbnRlcnNlY3Rpb25PYnNlcnZlclN1cHBvcnQ6IkludGVyc2VjdGlvbk9ic2VydmVyImluIHdpbmRvdyYmIkludGVyc2VjdGlvbk9ic2VydmVyRW50cnkiaW4gd2luZG93JiYiaW50ZXJzZWN0aW9uUmF0aW8iaW4gd2luZG93LkludGVyc2VjdGlvbk9ic2VydmVyRW50cnkucHJvdG90eXBlLG11dGF0aW9uT2JzZXJ2ZXJTdXBwb3J0OiJNdXRhdGlvbk9ic2VydmVyImluIHdpbmRvdyxpZGxlQ2FsbGJhY2tTdXBwb3J0OiJyZXF1ZXN0SWRsZUNhbGxiYWNrImluIHdpbmRvdyxhc3luY0RlY29kZVN1cHBvcnQ6ImRlY29kZSJpbiBvLHJlcGxhY2VXaXRoU3VwcG9ydDoicmVwbGFjZVdpdGgiaW4gbyxpZ25vcmVkSW1nQXR0cmlidXRlczpbImRhdGEtc3JjIiwiZGF0YS1zaXplcyIsImRhdGEtbWVkaWEiLCJkYXRhLXNyY3NldCIsInNyYyIsInNyY3NldCJdLGFjY2VwdGVkRGF0YUF0dHJpYnV0ZXM6WyJkYXRhLXNyYyIsImRhdGEtc2l6ZXMiLCJkYXRhLW1lZGlhIiwiZGF0YS1zcmNzZXQiXSxldmVudHNUb0JpbmQ6W1tkb2N1bWVudCwic2Nyb2xsIl0sW2RvY3VtZW50LCJ0b3VjaG1vdmUiXSxbd2luZG93LCJyZXNpemUiXSxbd2luZG93LCJvcmllbnRhdGlvbmNoYW5nZSJdXX0saT1kKHtsYXp5Q2xhc3M6ImxhenkiLGxhenlCYWNrZ3JvdW5kQ2xhc3M6ImxhenktYmciLGxhenlCYWNrZ3JvdW5kTG9hZGVkOiJsYXp5LWJnLWxvYWRlZCIsdGhyb3R0bGVUaW1lOjIwMCxpZGx5TG9hZDohMSxpZGxlTG9hZFRpbWVvdXQ6MTAwLHRocmVzaG9sZDoyMDAsb2JzZXJ2ZUNoYW5nZXM6ITEsb2JzZXJ2ZVJvb3RTZWxlY3RvcjoiYm9keSIsbXV0YXRpb25PYnNlcnZlck9wdGlvbnM6e2NoaWxkTGlzdDohMH19LGUpLHM9ImltZy4iK2kubGF6eUNsYXNzKyIsdmlkZW8uIitpLmxhenlDbGFzcysiLGlmcmFtZS4iK2kubGF6eUNsYXNzKyIsLiIraS5sYXp5QmFja2dyb3VuZENsYXNzLGM9e3RpbWVvdXQ6aS5pZGxlTG9hZFRpbWVvdXR9LGw9W10uc2xpY2UuY2FsbChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKHMpKTtpZighMD09PW4uaW50ZXJzZWN0aW9uT2JzZXJ2ZXJTdXBwb3J0KXt2YXIgdT1uZXcgSW50ZXJzZWN0aW9uT2JzZXJ2ZXIoZnVuY3Rpb24oZSxyKXtlLmZvckVhY2goZnVuY3Rpb24oZSl7aWYoITA9PT1lLmlzSW50ZXJzZWN0aW5nfHwwPGUuaW50ZXJzZWN0aW9uUmF0aW8pe3ZhciB0PWUudGFyZ2V0OyEwPT09aS5pZGx5TG9hZCYmITA9PT1uLmlkbGVDYWxsYmFja1N1cHBvcnQ/cmVxdWVzdElkbGVDYWxsYmFjayhmdW5jdGlvbigpe2EodCl9LGMpOmEodCksdC5jbGFzc0xpc3QucmVtb3ZlKGkubGF6eUNsYXNzKSxyLnVub2JzZXJ2ZSh0KSxsPWwuZmlsdGVyKGZ1bmN0aW9uKGUpe3JldHVybiBlIT09dH0pfX0pfSx7cm9vdE1hcmdpbjppLnRocmVzaG9sZCsicHggMCUifSk7bC5mb3JFYWNoKGZ1bmN0aW9uKGUpe3JldHVybiB1Lm9ic2VydmUoZSl9KX1lbHNlIG4uZXZlbnRzVG9CaW5kLmZvckVhY2goZnVuY3Rpb24oZSl7cmV0dXJuIGVbMF0uYWRkRXZlbnRMaXN0ZW5lcihlWzFdLHIpfSkscigpOyEwPT09bi5tdXRhdGlvbk9ic2VydmVyU3VwcG9ydCYmITA9PT1pLm9ic2VydmVDaGFuZ2VzJiZuZXcgTXV0YXRpb25PYnNlcnZlcihmdW5jdGlvbihlKXtlLmZvckVhY2goZnVuY3Rpb24oZSl7W10uc2xpY2UuY2FsbChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKHMpKS5mb3JFYWNoKGZ1bmN0aW9uKGUpey0xPT09bC5pbmRleE9mKGUpJiYobC5wdXNoKGUpLCEwPT09bi5pbnRlcnNlY3Rpb25PYnNlcnZlclN1cHBvcnQ/dS5vYnNlcnZlKGUpOnIoKSl9KX0pfSkub2JzZXJ2ZShkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGkub2JzZXJ2ZVJvb3RTZWxlY3RvciksaS5tdXRhdGlvbk9ic2VydmVyT3B0aW9ucyl9Owpkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCJET01Db250ZW50TG9hZGVkIiwgZnVuY3Rpb24oKSB7eWFsbCh7b2JzZXJ2ZUNoYW5nZXM6IHRydWV9KTt9KTs=">
        // "use strict";var d=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var a in r)Object.prototype.hasOwnProperty.call(r,a)&&(e[a]=r[a])}return e},yall=function(e){var a=function(a){if("IMG"===a.tagName){var e=a.parentNode;if("PICTURE"===e.tagName&&[].slice.call(e.querySelectorAll("source")).forEach(function(e){return t(e)}),!0===n.asyncDecodeSupport&&!0===n.replaceWithSupport){var o=new Image;t(o,a),o.decode().then(function(){for(var e=0;e<a.attributes.length;e++){var t=a.attributes[e].name,r=a.attributes[e].value;-1===n.ignoredImgAttributes.indexOf(t)&&o.setAttribute(t,r)}a.replaceWith(o)})}else t(a)}"VIDEO"===a.tagName&&([].slice.call(a.querySelectorAll("source")).forEach(function(e){return t(e)}),a.load()),"IFRAME"===a.tagName&&(a.src=a.dataset.src,a.removeAttribute("data-src")),a.classList.contains(i.lazyBackgroundClass)&&(a.classList.remove(i.lazyBackgroundClass),a.classList.add(i.lazyBackgroundLoaded))},t=function(e){var t=(1<arguments.length&&void 0!==arguments[1]&&arguments[1]).dataset||e.dataset;for(var r in t)-1!==n.acceptedDataAttributes.indexOf("data-"+r)&&(e.setAttribute(r,t[r]),e.removeAttribute("data-"+r))},r=function yallBack(){var e=!1;!1===e&&0<l.length&&(e=!0,setTimeout(function(){l.forEach(function(t){t.getBoundingClientRect().top<=window.innerHeight+i.threshold&&t.getBoundingClientRect().bottom>=-i.threshold&&"none"!==getComputedStyle(t).display&&(!0===i.idlyLoad&&!0===n.idleCallbackSupport?requestIdleCallback(function(){a(t)},c):a(t),t.classList.remove(i.lazyClass),l=l.filter(function(e){return e!==t}))}),e=!1,0===l.length&&!1===i.observeChanges&&n.eventsToBind.forEach(function(e){return e[0].removeEventListener(e[1],yallBack)})},i.throttleTime))},o=new Image,n={intersectionObserverSupport:"IntersectionObserver"in window&&"IntersectionObserverEntry"in window&&"intersectionRatio"in window.IntersectionObserverEntry.prototype,mutationObserverSupport:"MutationObserver"in window,idleCallbackSupport:"requestIdleCallback"in window,asyncDecodeSupport:"decode"in o,replaceWithSupport:"replaceWith"in o,ignoredImgAttributes:["data-src","data-sizes","data-media","data-srcset","src","srcset"],acceptedDataAttributes:["data-src","data-sizes","data-media","data-srcset"],eventsToBind:[[document,"scroll"],[document,"touchmove"],[window,"resize"],[window,"orientationchange"]]},i=d({lazyClass:"lazy",lazyBackgroundClass:"lazy-bg",lazyBackgroundLoaded:"lazy-bg-loaded",throttleTime:200,idlyLoad:!1,idleLoadTimeout:100,threshold:200,observeChanges:!1,observeRootSelector:"body",mutationObserverOptions:{childList:!0}},e),s="img."+i.lazyClass+",video."+i.lazyClass+",iframe."+i.lazyClass+",."+i.lazyBackgroundClass,c={timeout:i.idleLoadTimeout},l=[].slice.call(document.querySelectorAll(s));if(!0===n.intersectionObserverSupport){var u=new IntersectionObserver(function(e,r){e.forEach(function(e){if(!0===e.isIntersecting||0<e.intersectionRatio){var t=e.target;!0===i.idlyLoad&&!0===n.idleCallbackSupport?requestIdleCallback(function(){a(t)},c):a(t),t.classList.remove(i.lazyClass),r.unobserve(t),l=l.filter(function(e){return e!==t})}})},{rootMargin:i.threshold+"px 0%"});l.forEach(function(e){return u.observe(e)})}else n.eventsToBind.forEach(function(e){return e[0].addEventListener(e[1],r)}),r();!0===n.mutationObserverSupport&&!0===i.observeChanges&&new MutationObserver(function(e){e.forEach(function(e){[].slice.call(document.querySelectorAll(s)).forEach(function(e){-1===l.indexOf(e)&&(l.push(e),!0===n.intersectionObserverSupport?u.observe(e):r())})})}).observe(document.querySelector(i.observeRootSelector),i.mutationObserverOptions)};
        // document.addEventListener("DOMContentLoaded", function() {yall({observeChanges: true});});
        </script>
        <script src="https://cdn.jsdelivr.net/lodash/4.13.1/lodash.js"></script>
        <script>
            localStorage.setItem('post_{{ $post->id }}', JSON.stringify({!! $post->toJSON() !!}));
            var post = JSON.parse(localStorage.getItem('post_{{ $post->id }}'));
            var isEditor = true;
        </script>
        <script src="/js/app.js"></script>
    </body>
</html>