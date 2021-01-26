<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            <span>&copy; {{__('all.copyright')}} <a
                    href="https://www.facebook.com/YousufAymooni" target="_blank">{{__('all.yousif')}}</a> <script>document.write(new Date().getFullYear());</script></span>
        </div>
    </div>
</footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!--Scripts-->
<script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/counterup/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scrollmagic/ScrollMagic.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/greensock/TweenMax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/easing/easing.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/aos/aos.js')}}"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{asset('js/elements_custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('.nav-menu-ul a').filter(function () {
            return this.href == location.href
        }).parent().addClass('active').siblings().removeClass('active')
    })
</script>
<script>
    AOS.init();
</script>
@yield('js')
<!--End Scripts-->

</body>

</html>
