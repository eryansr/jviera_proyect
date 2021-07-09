<footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="" target="_blank">{{ __('Fartodo') }}</a>
                    </li>
                    <li>
                        <a href="" target="_blank">{{ __('Bienestar') }}</a>
                    </li>
                    <li>
                        <a href="" target="_blank">{{ __('Servicio') }}</a>
                    </li>
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', Creado ') }}<i class="fa fa-heart heart"></i>{{ __(' por ') }}<a class="@if(Auth::guest()) text-white @endif" href="" target="_blank">{{ __('Jose Vieiria') }}</a>{{ __(' C.I: ') }}<a class="@if(Auth::guest()) text-white @endif" target="_blank" href="">{{ __('28.219.948') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>