<script src="scripts/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,kY:-20}],
              [{b:-1,d:1,x:-20,rY:-30},{b:0,d:1000,x:0,o:1,rY:0,e:{x:7,o:7,rY:7},p:{x:{dl:0.1},o:{dl:0.1},rY:{dl:0.1}}}],
              [{b:-1,d:1,x:-20,rY:-30},{b:200,d:1000,x:0,o:1,rY:0,e:{x:7,o:7,rY:7},p:{x:{dl:0.1,o:1},o:{dl:0.1,o:1},rY:{dl:0.1,o:1}}}],
              [{b:-1,d:1,x:-20,rY:-30},{b:1000,d:1000,x:0,o:1,rY:0,e:{x:7,o:7,rY:7},p:{x:{dl:0.1},o:{dl:0.1},rY:{dl:0.1}}}],
              [{b:-1,d:1,x:-20,rY:-30},{b:1200,d:1000,x:0,o:1,rY:0,e:{x:7,o:7,rY:7},p:{x:{dl:0.1,o:1},o:{dl:0.1,o:1},rY:{dl:0.1,o:1}}}],
              [{b:0,d:600,o:1},{b:600,d:1000,rp:1}],
              [{b:-1,d:1,ls:2},{b:220,d:980,o:1,ls:0.2,e:{ls:6}}],
              [{b:600,d:1000,pt:{d:"M691-57L546.64,289L277.36,259L691-57Z"},e:{pt:6},p:{pt:{dl:0.3}}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 16,
                $SpacingY: 16
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 106 css*/
        .jssorb106 {position:absolute;}
        .jssorb106 .i {position:absolute;cursor:pointer;}
        .jssorb106 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1800;stroke-miterlimit:10;stroke-opacity:0.8;}
        .jssorb106 .i:hover .b {fill:#fff;fill-opacity:1;stroke:#2b1908;stroke-opacity:1;}
        .jssorb106 .iav .b {fill:#fff;fill-opacity:1;stroke-width:1800;stroke:#46d1d3;stroke-opacity:0.6;}
        .jssorb106 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>

<!--#############################################################################################################-->

    <svg viewbox="0 0 0 0" width="0" height="0" style="display:block;position:relative;left:0px;top:0px;">
        <defs>
            <filter id="jssor_1_flt_1" x="-50%" y="-50%" width="200%" height="200%">
                <feImage x="0" y="0" width="980" height="380" data-load="href" result="r1" href="img/surf.jpg"></feImage>
                <feDisplacementMap in="SourceGraphic" in2="r1" scale="0" xchannelselector="R" ychannelselector="G" result="r2"></feDisplacementMap>
                <feBlend mode="overlay" in="r2" in2="r1" result="r3"></feBlend>
                <feComposite operator="in" in="r3" in2="r2" result="r4"></feComposite>
            </filter>
            <mask id="jssor_1_msk_3">
                <path fill="#ffffff" id="jssor_1_lyr_2" d="M798.72,99.31L798.72,281.51L183.43,281.51L183.43,99.31L798.72,99.31Z" x="183" y="99" data-t="7" style="position:absolute;overflow:visible;"></path>
            </mask>
        </defs>
    </svg>

    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="images/site/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            

<!--#############################################################################################################-->

      <div >
            <img data-u="image" src="images/site/logo.png" />              
      </div>

      <div >
            <img data-u="image" src="images/adventures/surfing.jpg" />              
      </div>

      <div >
            <img data-u="image" src="images/adventures/cycling.jpg" />              
      </div>

      <div >
            <img data-u="image" src="images/adventures/sailing.jpg" />              
      </div>

      <div >
            <img data-u="image" src="images/adventures/hiking.jpg" />              
      </div>


<!--##############################################################################################################-->       


        </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">design web</a>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb106" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:12px;height:12px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                </svg>
            </div>
        </div>

<!--##################################################################################################################################################################-->

        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();
    </script>
