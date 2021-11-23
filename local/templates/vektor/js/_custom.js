(function (factory) {
  typeof define === 'function' && define.amd ? define(factory) :
  factory();
}(function () { 'use strict';

  function _toConsumableArray(arr) {
    return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
  }

  function _arrayWithoutHoles(arr) {
    if (Array.isArray(arr)) return _arrayLikeToArray(arr);
  }

  function _iterableToArray(iter) {
    if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
  }

  function _unsupportedIterableToArray(o, minLen) {
    if (!o) return;
    if (typeof o === "string") return _arrayLikeToArray(o, minLen);
    var n = Object.prototype.toString.call(o).slice(8, -1);
    if (n === "Object" && o.constructor) n = o.constructor.name;
    if (n === "Map" || n === "Set") return Array.from(o);
    if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
  }

  function _arrayLikeToArray(arr, len) {
    if (len == null || len > arr.length) len = arr.length;

    for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];

    return arr2;
  }

  function _nonIterableSpread() {
    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
  }

  function _createForOfIteratorHelper(o, allowArrayLike) {
    var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"];

    if (!it) {
      if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") {
        if (it) o = it;
        var i = 0;

        var F = function () {};

        return {
          s: F,
          n: function () {
            if (i >= o.length) return {
              done: true
            };
            return {
              done: false,
              value: o[i++]
            };
          },
          e: function (e) {
            throw e;
          },
          f: F
        };
      }

      throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
    }

    var normalCompletion = true,
        didErr = false,
        err;
    return {
      s: function () {
        it = it.call(o);
      },
      n: function () {
        var step = it.next();
        normalCompletion = step.done;
        return step;
      },
      e: function (e) {
        didErr = true;
        err = e;
      },
      f: function () {
        try {
          if (!normalCompletion && it.return != null) it.return();
        } finally {
          if (didErr) throw err;
        }
      }
    };
  }

  function setMaxHeight(selector) {
    var resize = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

    try {
      var nodeList = document.querySelectorAll(selector);

      _toConsumableArray(nodeList).map(function (item) {
        return item.style.height = "auto";
      });

      var maxHeight = Math.max.apply(Math, _toConsumableArray(nodeList).map(function (item) {
        return item.offsetHeight;
      }));

      _toConsumableArray(nodeList).map(function (item) {
        return item.style.height = "".concat(maxHeight, "px");
      });

      if (resize) {
        var timer;
        window.addEventListener('resize', function () {
          clearTimeout(timer);
          timer = setTimeout(function () {
            setMaxHeight(selector, false);
          }, 500);
        });
      }
    } catch (e) {}
  }

  document.setMaxHeight = setMaxHeight;

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.header')) {
      // Фиксированная шапка
      if (document.querySelector('.header-fixed')) {
        var height = document.querySelector('.header').offsetHeight;
        var fixedHeader = document.querySelector('.header-fixed');
        window.addEventListener('scroll', function (e) {
          if (window.scrollY > height) {
            fixedHeader.classList.add('header-fixed_visible');
          } else {
            fixedHeader.classList.remove('header-fixed_visible');
          }
        });
      } // Меню


      if (document.querySelector('.header-menu__item_big')) {
        document.querySelectorAll('.header-menu__item_big').forEach(function (item) {
          try {
            item.querySelector('ul li').classList.add('header-menu__subitem_open');
            var items = Array.from(item.querySelector('ul').children);
            items.forEach(function (subitem) {
              subitem.addEventListener('mouseover', function () {
                items.forEach(function (elem) {
                  return elem.classList.remove('header-menu__subitem_open');
                });
                subitem.classList.add('header-menu__subitem_open');
              });
            });
            item.addEventListener('mouseover', function () {
              clearTimeout(item.timeout);
              this.querySelector('ul').classList.add('header-menu__sublist_open');
            });
            item.addEventListener('mouseout', function () {
              var _this = this;

              item.timeout = setTimeout(function () {
                _this.querySelector('ul').classList.remove('header-menu__sublist_open');
              }, 100);
            });
          } catch (error) {}
        });
      } // Поиск


      if (document.querySelector('.header-search__button')) {
        document.querySelectorAll('.header-search__button').forEach(function (button) {
          button.addEventListener('click', function (e) {
            if (window.innerWidth > 991) {
              e.preventDefault();
              this.nextElementSibling.classList.add('header-search__container_open');
            }
          });
        });
      }

      if (document.querySelector('.header-search__close')) {
        document.querySelectorAll('.header-search__close').forEach(function (button) {
          button.addEventListener('click', function () {
            this.parentElement.classList.remove('header-search__container_open');
          });
        });
      }

      document.addEventListener('click', function (e) {
        if (document.querySelector('.header-search__container_open') && !e.target.closest('.header-search')) {
          document.querySelector('.header-search__container_open').classList.remove('header-search__container_open');
        }

        if (document.querySelector('.header-mobile_open') && !e.target.closest('.header-mobile') && !e.target.closest('.header-burger')) {
          document.querySelector('.header-mobile_open').classList.remove('header-mobile_open');
          document.querySelector('.header-dark').classList.remove('header-dark_visible');
          document.body.classList.remove('no-scroll');
        }
      }); // Мобильное меню

      if (document.querySelector('.header-mobile')) {
        var headerMobile = document.querySelector('.header-mobile');
        document.querySelectorAll('.header-burger').forEach(function (burger) {
          burger.addEventListener('click', function () {
            headerMobile.classList.add('header-mobile_open');
            document.querySelector('.header-dark').classList.add('header-dark_visible');
            document.body.classList.add('no-scroll');
          });
        });
        document.querySelectorAll('.header-mobile__close').forEach(function (burger) {
          burger.addEventListener('click', function () {
            headerMobile.classList.remove('header-mobile_open');
            document.querySelector('.header-dark').classList.remove('header-dark_visible');
            document.body.classList.remove('no-scroll');
          });
        });
        var contactsBlock = document.querySelector('.header-mobile__contacts');
        Array.from(document.querySelector('.header-mobile__list').children).forEach(function (item) {
          if (item.querySelector('ul')) {
            item.querySelector('.header-mobile__link').addEventListener('click', function (e) {
              e.preventDefault();
              item.querySelector('.header-mobile__inner').classList.add('header-mobile__inner_open');
              item.querySelector('.header-mobile__inner').append(contactsBlock);
              headerMobile.classList.add('no-scroll');
            });
          }
        });
        document.querySelectorAll('.header-mobile__back-button').forEach(function (item) {
          item.addEventListener('click', function () {
            this.closest('.header-mobile__inner').classList.remove('header-mobile__inner_open');
            headerMobile.classList.remove('no-scroll');
            document.querySelector('.header-mobile__menu').append(contactsBlock);
          });
        });
      }
    }
  });

  var bigBannerLeft = new Swiper('.big-banner__left', {
    speed: 400,
    simulateTouch: false,
    loop: true,
    loopAdditionalSlides: 3,
    slideActiveClass: 'big-banner__item_active',
    effect: 'fade',
    autoplay: {
      delay: 3000
    },
    navigation: {
      nextEl: '.big-banner__next',
      prevEl: '.big-banner__prev'
    },
    pagination: {
      el: '.big-banner__pagination',
      type: 'bullets',
      clickable: true,
      bulletClass: 'banner-pagination__bullet',
      bulletActiveClass: 'banner-pagination__bullet_active',
      modifierClass: 'banner-pagination__'
    }
  });
  var bigBannerRight = new Swiper('.big-banner__right', {
    speed: 600,
    slidesPerView: 3,
    loop: true,
    simulateTouch: false,
    loopAdditionalSlides: 3,
    followFinger: false,
    slidePrevClass: 'big-banner__item_prev',
    slideActiveClass: 'big-banner__item_active',
    slideDuplicateNextClass: 'big-banner__duplicate-next',
    autoplay: {
      delay: 3000
    },
    navigation: {
      nextEl: '.big-banner__next',
      prevEl: '.big-banner__prev'
    },
    pagination: {
      el: '.big-banner__pagination',
      type: 'bullets',
      clickable: true,
      bulletClass: 'banner-pagination__bullet',
      bulletActiveClass: 'banner-pagination__bullet_active',
      modifierClass: 'banner-pagination__'
    },
    breakpoints: {
      0: {},
      781: {
        spaceBetween: 0
      },
      1600: {
        spaceBetween: 26
      }
    }
  });

  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  var youtubeContainers = document.querySelectorAll('.youtube-video');
  var youtubePlayers = [];

  if (youtubeContainers) {
    window.onYouTubePlayerAPIReady = function () {
      youtubeContainers.forEach(function (item) {
        var videoId = item.dataset.videoId;
        var player = new YT.Player(item, {
          height: '360',
          width: '640',
          videoId: videoId // events: {
          //   'onReady': onPlayerReady,
          //   'onStateChange': onPlayerStateChange
          // }

        });
        youtubePlayers.push(player);
      });
    };
  }

  var getYPByID = function getYPByID(id) {
    return youtubePlayers.filter(function (item) {
      return item.h.getAttribute('id') === id;
    })[0];
  }; // export  


  document.getYPByID = getYPByID;

  // function from './youtubeApi.js'; 
  var getYPByID$1 = document.getYPByID;

  function previewOnClick(event) {
    var videoBlock = event.currentTarget;
    var playerId = event.currentTarget.querySelector('.youtube-video').getAttribute('id');
    var player = getYPByID$1(playerId);

    if (!videoBlock.classList.contains('active')) {
      videoBlock.classList.add('active');
      player.playVideo();
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    var players = document.querySelectorAll('.video-block'); // setTimeout(() => function() {
    // 	console.log(document.YT);
    // }, 1000)

    if (players.length > 0) {
      players.forEach(function (player) {
        return player.addEventListener('click', previewOnClick);
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.tab')) {
      var toggleTab = function toggleTab() {
        buttonTab.classList.toggle('tab__button_active');
        var tabs = document.querySelectorAll('.tab__item');
        tabs.forEach(function (item) {
          item.classList.toggle('tab__item_active');
        });
        var content = document.querySelectorAll('.tab-content__item');
        content.forEach(function (item) {
          item.classList.toggle('tab-content__item_active');
        });
      };

      var buttonTab = document.querySelector('.tab__button');
      var tab = document.querySelector('.tab');
      tab.addEventListener('click', function (event) {
        var target = event.target;

        if (target.tagName == "H2") {
          if (!target.parentElement.classList.contains('tab__item_active')) {
            toggleTab();
          }
        }
      });
      buttonTab.addEventListener('click', function () {
        toggleTab();
      });
    }
  });

  document.setMaxHeight('.slider__inner.slider__inner_company .slider__text-inner');
  document.setMaxHeight('.slider_catalog .slider__text-inner');

  function includeSwiper(a, b, c, d, e, f, g, h) {
    var slider = ['slider'];
    slider[0] += a;
    slider[0] = new Swiper(b, {
      speed: 500,
      spaceBetween: g,
      slidesPerView: h,
      loop: true,
      effect: c,
      simulateTouch: false,
      observer: true,
      observeParents: true,
      slideActiveClass: 'slider__item_active',
      pagination: {
        el: d,
        clickable: true,
        type: 'bullets',
        bulletClass: 'banner-pagination__bullet',
        bulletActiveClass: 'banner-pagination__bullet_active',
        modifierClass: 'slider__'
      },
      navigation: {
        nextEl: e,
        prevEl: f
      }
    });
  } // Main


  includeSwiper('topMainText', '.slider_main-top .slider__text', 'fade', '.slider__pagination_main-top', '.slider__next_main-top', '.slider__prev_main-top', 0, 1);
  includeSwiper('topMainImage', '.slider_main-top .slider__image', 'slide', '.slider__pagination_main-top', '.slider__next_main-top', '.slider__prev_main-top', 30, 1);
  includeSwiper('bottomMainText', '.slider_main-bottom .slider__text', 'fade', '.slider__pagination_main-bottom', '.slider__next_main-bottom', '.slider__prev_main-bottom', 0, 1);
  includeSwiper('bottomMainImage', '.slider_main-bottom .slider__image', 'slide', '.slider__pagination_main-bottom', '.slider__next_main-bottom', '.slider__prev_main-bottom', 30, 1); //Company

  includeSwiper('topCompanyText', '.slider_company-top .slider__text', 'fade', '.slider__pagination_company-top', '.slider__next_company-top', '.slider__prev_company-top', 0, 1);
  includeSwiper('topCompanyImage', '.slider_company-top .slider__image', 'slide', '.slider__pagination_company-top', '.slider__next_company-top', '.slider__prev_company-top', 30, 1);
  includeSwiper('bottomCompanyText', '.slider_company-bottom .slider__text', 'fade', '.slider__pagination_company-bottom', '.slider__next_company-bottom', '.slider__prev_company-bottom', 0, 1);
  includeSwiper('bottomCompanyImage', '.slider_company-bottom .slider__image', 'slide', '.slider__pagination_company-bottom', '.slider__next_company-bottom', '.slider__prev_company-bottom', 30, 1); //Catalog

  includeSwiper('redCatalogText', '.slider_catalog-red .slider__text', 'fade', '.slider__pagination_catalog-red', '.slider__next_catalog-red', '.slider__prev_catalog-red', 0, 1);
  includeSwiper('redCatalogImage', '.slider_catalog-red .slider__image', 'slide', '.slider__pagination_catalog-red', '.slider__next_catalog-red', '.slider__prev_catalog-red', 30, 1);
  includeSwiper('blueCatalogText', '.slider_catalog-blue .slider__text', 'fade', '.slider__pagination_catalog-blue', '.slider__next_catalog-blue', '.slider__prev_catalog-blue', 0, 1);
  includeSwiper('blueCatalogImage', '.slider_catalog-blue .slider__image', 'slide', '.slider__pagination_catalog-blue', '.slider__next_catalog-blue', '.slider__prev_catalog-blue', 30, 1);
  includeSwiper('purpleCatalogText', '.slider_catalog-purple .slider__text', 'fade', '.slider__pagination_catalog-purple', '.slider__next_catalog-purple', '.slider__prev_catalog-purple', 0, 1);
  includeSwiper('purpleCatalogImage', '.slider_catalog-purple .slider__image', 'slide', '.slider__pagination_catalog-purple', '.slider__next_catalog-purple', '.slider__prev_catalog-purple', 30, 1);

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.clients')) {
      var clientsSlider = new Swiper('.clients__slider', {
        spaceBetween: 80,
        slidesPerView: 'auto',
        loop: true,
        simulateTouch: false,
        pagination: {
          el: '.clients-pagination',
          type: 'bullets',
          bulletClass: 'clients-pagination__bullet',
          bulletActiveClass: 'clients-pagination__bullet_active',
          clickable: true
        },
        navigation: {
          nextEl: '.clients-nav__next',
          prevEl: '.clients-nav__prev'
        },
        autoplay: {
          delay: 3000,
          disableOnInteraction: false
        },
        breakpoints: {
          0: {
            spaceBetween: 15
          },
          560: {
            spaceBetween: 30
          },
          1280: {
            spaceBetween: 80
          }
        }
      });

      if (document.querySelector('.clients__advantages-items')) {
        var setMapLineWidth = function setMapLineWidth() {
          if (document.querySelector('.clients__map-line')) {
            var mapLine = document.querySelector('.clients__map-line');
            var lineAttr = mapLine.getAttribute('d');
            var arLineAttr = lineAttr.split(' ');

            if (window.innerWidth <= 1600) {
              arLineAttr[arLineAttr.length - 1] = '90';
              mapLine.setAttribute('d', arLineAttr.join(' '));
            } else if (window.innerWidth > 1600) {
              arLineAttr[arLineAttr.length - 1] = '197';
              mapLine.setAttribute('d', arLineAttr.join(' '));
            }
          }
        };

        var removeItemClass = function removeItemClass() {
          var clientsAdv = document.querySelectorAll('.clients__advantages-slide');

          if (window.innerWidth <= 780) {
            for (var i = 0; i < clientsAdv.length; i++) {
              clientsAdv[i].classList.remove('clients__advantages-item');
            }
          } else if (window.innerWidth > 780) {
            for (var _i = 0; _i < clientsAdv.length; _i++) {
              clientsAdv[_i].classList.add('clients__advantages-item');
            }
          }
        };

        var shortDescText = function shortDescText() {
          if (window.innerWidth <= 780) {
            if (clientsDesc.innerHTML.length > 340) {
              var newStr = clientsDesc.innerHTML.substring(0, 340);
              clientsDesc.innerHTML = newStr + ' ...';
              clientsDesc.appendChild(moreArrow);
            }
          } else if (window.innerWidth > 780) {
            clientsDesc.innerHTML = originalStr;
          }
        };

        var advantagesSlider = new Swiper('.clients__advantages-items', {
          slidesPerView: 6,
          simulateTouch: false,
          breakpoints: {
            0: {
              slidesPerView: 2,
              slidesPerGroup: 2,
              spaceBetween: 0
            },
            781: {
              slidesPerView: 6
            }
          },
          pagination: {
            el: '.clients__pagination',
            type: 'bullets',
            bulletClass: 'banner-pagination__bullet',
            bulletActiveClass: 'banner-pagination__bullet_active'
          },
          navigation: {
            nextEl: '.clients__arrows-item_next',
            prevEl: '.clients__arrows-item_prev'
          }
        });
        var clientsDesc = document.querySelector('.clients__desc_adv');
        var originalStr = clientsDesc.innerHTML;
        var moreArrow = document.querySelector('.clients__more-arrow');
        setMapLineWidth();
        removeItemClass();
        shortDescText();
        window.addEventListener('resize', function () {
          setMapLineWidth();
          removeItemClass();
          shortDescText();
        });
      }
    }
  });

  function playVideo(elem) {
    elem.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
  }

  function pauseVideo(elem) {
    elem.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
  }

  function getYoutubeVideoIdFromHref(href) {
    var id;
    var hrefSplitted = href.split('/');
    var notClearId = hrefSplitted[hrefSplitted.length - 1];

    if (notClearId.includes('?v=')) {
      id = notClearId.split('?v=')[1].split('&')[0];
    } else {
      id = notClearId.split('?')[0];
    }

    return id;
  }

  window.addPopupListener = function () {
    document.querySelectorAll('.popup').forEach(function (item) {
      item.addEventListener('click', function (e) {
        if (!e.target.closest('.popup__content') && !e.target.closest('.file-input__file')) {
          this.classList.remove('popup_open');
          document.body.classList.remove('no-scroll');

          if (this.querySelector('iframe')) {
            this.querySelectorAll('iframe').forEach(function (iframe) {
              pauseVideo(iframe);
              console.log(iframe);
            });
          }
        }
      });
    });
  };

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.popup')) {
      document.body.addEventListener('click', function (e) {
        if (e.target.closest('[data-popup]')) {
          try {
            e.preventDefault();
            var thisElem = e.target.closest('[data-popup]');
            var id = thisElem.dataset.popup;
            var popup = document.querySelector("#".concat(id));
            var content = popup.querySelector('.popup__content');

            if (thisElem.dataset.popupImg) {
              var href = thisElem.dataset.popupImg;

              if (!(popup.querySelector('img') && popup.querySelector('img').src == href)) {
                var elem = "<img src=\"".concat(href, "\" alt=\"\">");
                content.innerHTML = '';
                content.insertAdjacentHTML('beforeend', elem);
              }
            }

            if (thisElem.dataset.popupVideo) {
              var _href = thisElem.dataset.popupVideo;

              var _id = getYoutubeVideoIdFromHref(_href);

              if (!(popup.querySelector('iframe') && getYoutubeVideoIdFromHref(popup.querySelector('iframe').src) === _id)) {
                if (!_href.includes('youtube.com') && !_href.includes('youtu.be')) {
                  _href = "https://www.youtube.com/embed/".concat(_href);
                }

                var _elem = "<iframe width=\"1120\" height=\"630\" src=\"".concat(_href, "?autoplay=1&rel=0&enablejsapi=1\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>");

                content.innerHTML = '';
                content.insertAdjacentHTML('beforeend', _elem);
              } else {
                playVideo(popup.querySelector('iframe'));
              }
            }

            popup.classList.add('popup_open');
            document.body.classList.add('no-scroll');
          } catch (e) {}
        }
      });
      window.addPopupListener();
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.reviews')) {
      var reviewsSlider = new Swiper('.reviews__slider', {
        effect: 'fade',
        speed: 400,
        simulateTouch: false,
        pagination: {
          el: '.reviews-pagination',
          clickable: true,
          bulletClass: 'reviews-pagination__bullet',
          bulletActiveClass: 'reviews-pagination__bullet_active',
          renderBullet: function renderBullet(index, className) {
            return '<span class="' + className + '">' + (index + 1 < 10 ? '0' + (index + 1) : index + 1) + '</span>';
          }
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('form')) {
      var myform = new Form(document.querySelectorAll('form'), {
        focusValidate: true,
        classes: {
          empty: 'input_empty',
          error: 'input_error',
          correct: 'input_correct'
        },
        fields: [{
          selector: '.am-name',
          maxLength: 32,
          realTimeRegExp: 'text',
          realTime: true,
          required: true
        }, {
          selector: '.am-count',
          maxLength: 32,
          realTimeRegExp: 'num',
          realTime: true
        }, {
          selector: '.am-company',
          maxLength: 32,
          realTimeRegExp: 'text',
          realTime: true
        }, {
          selector: '.am-city',
          maxLength: 32,
          realTimeRegExp: 'text',
          realTime: true
        }, {
          selector: '.am-message',
          realTimeRegExp: 'text',
          realTime: true
        }, {
          selector: '.am-phone',
          maxLength: 32,
          realTimeRegExp: 'phone',
          realTime: true,
          required: true,
          regExp: 'phone',
          mask: '+7 (***) ***-**-**'
        }, {
          selector: '.am-email',
          maxLength: 32,
          realTimeRegExp: 'email',
          realTime: true,
          required: true,
          regExp: 'email'
        }, {
          selector: '.am-contact',
          maxLength: 32,
          realTimeRegExp: 'text',
          realTime: true,
          required: true
        }, {
          selector: '.am-login',
          maxLength: 32,
          realTimeRegExp: 'text',
          realTime: true,
          required: true
        }, {
          selector: '.am-pass',
          maxLength: 32,
          required: true
        }, {
          selector: '.form_dropdown_select',
          maxLength: 32
        }]
      });
      myform.on('error', function (input) {
        try {
          var parent = input.parentNode;
          var message = parent.querySelector('.message');
          message.classList.add('active');
          setTimeout(function () {
            return message.classList.remove('active');
          }, 2000);
        } catch (error) {}
      });
      myform.on('empty', function (input) {
        try {
          var parent = input.parentNode;
          var message = parent.querySelector('.message');
          message.classList.add('active');
          setTimeout(function () {
            return message.classList.remove('active');
          }, 2000);
        } catch (error) {}
      }); // myform.on('submit', function (e) {
      // 	const form = e.target;
      // 	if (!form.classList.contains('form_subscribe') && (!form.classList.contains('header-search__form') && !form.classList.contains('search-form')) && form.name != 'form_auth') {
      // 		e.preventDefault();
      // 		const url = '/ajax/forms.php';
      // 		const type = form.getAttribute('method') || 'POST';
      // 		const data = new FormData(e.target);
      // 		if (form.querySelector('input[type="file"]')) {
      // 			let inputs = [...form.querySelectorAll('input[name*="file"]')].map(input => input.name);
      // 			const inputNames = []
      // 			inputs = inputs.filter((input) => {
      // 				const isInclude = inputNames.includes(input.name)
      // 				inputNames.push(input.name)
      // 				return isInclude
      // 			})
      // 			if (form.querySelector('.filepond')) {
      // 				const pond = FilePond.find(form.querySelector('.filepond'));
      // 				const files = pond.getFiles();
      // 				if (files)
      // 					files.forEach((elem, i) => {
      // 						data.set(inputs[i], elem.file);
      // 					})
      // 			}
      // 		}
      // 		$.ajax({
      // 			url,
      // 			type,
      // 			data: data,
      // 			processData: false,
      // 			contentType: false,
      // 		})
      // 		.done(function () {
      // 			const message = `<div class='refresh-page'>
      // 				<div class="refresh-page__title"><h3>Форма успешно отправлена!</h3></div>
      // 					<button style='width:310px' onclick="window.location.reload();" class='button form__button refresh-page'>Перезагрузить страницу</button>
      // 				</div>`
      // 			form.innerHTML = message
      // 		})
      // 		.fail(function (error) {
      // 			console.error('ошибка');
      // 		});
      // 	}
      // })
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.history')) {
      var getCoords = function getCoords(elem) {
        var box = elem.getBoundingClientRect();
        return {
          top: box.top + pageYOffset,
          bottom: box.bottom + pageYOffset,
          left: box.left + pageXOffset,
          right: box.right + pageXOffset
        };
      };

      var checkArrow = function checkArrow() {
        if (pageYOffset + window.innerHeight / 2 > coords.top && pageYOffset + window.innerHeight / 2 < coords.bottom) {
          arrow.classList.add('history-arrow_visible');
          window.removeEventListener('scroll', checkArrow);
        }
      };

      var inBrowser = typeof window !== 'undefined';
      var UA = inBrowser && window.navigator.userAgent.toLowerCase();
      var isIE = UA && /msie|trident/.test(UA);
      var arrow = document.querySelector('.history-arrow');
      var coords = getCoords(arrow);

      if (isIE) {
        document.querySelector('.history-arrow__svg').style.display = 'none';
        document.querySelector('.history-arrow__svg_ie').style.display = 'block';
      }

      checkArrow();
      window.addEventListener('scroll', checkArrow);
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.our-production')) {
      var productionSlider = new Swiper('.our-production__slider', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        loop: true,
        pagination: {
          el: '.our-production-pagination',
          type: 'bullets',
          bulletClass: 'our-production-pagination__bullet',
          bulletActiveClass: 'our-production-pagination__bullet_active',
          clickable: true
        },
        navigation: {
          nextEl: '.our-production-nav__next',
          prevEl: '.our-production-nav__prev'
        },
        autoplay: {
          delay: 3000,
          disableOnInteraction: false
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.slider-reviews')) {
      var slider = new Swiper('.slider-reviews__slider', {
        effect: 'fade',
        speed: 400,
        simulateTouch: false,
        observer: true,
        observeParents: true,
        pagination: {
          el: '.slider-reviews__pagination',
          type: 'bullets',
          bulletClass: 'slider-reviews__bullet',
          bulletActiveClass: 'slider-reviews__bullet_active',
          clickable: true
        },
        navigation: {
          nextEl: '.slider-reviews__next',
          prevEl: '.slider-reviews__prev'
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    var filters = document.querySelectorAll('.filter');
    if (filters.length <= 0) return false;

    if (!document.querySelector('.filter_no-clone')) {
      var fixedFilter = filters[0].cloneNode(true);
      fixedFilter.classList.add('closed', 'filter_fixed', 'filter_clone'); // Раньше фильтр появлялся только когда надо
      // window.addEventListener('scroll', function(e) {
      // 	const offsetFromFilter = document.querySelector('.filter').getBoundingClientRect().top;
      // 	if (offsetFromFilter + fixedFilter.scrollHeight + 200 < 0) {
      // 		fixedFilter.classList.add('filter_fixed');
      // 	} else {
      // 		fixedFilter.classList.remove('filter_fixed');
      // 		fixedFilter.classList.add('closed');
      // 	}
      // });

      document.body.appendChild(fixedFilter);
    }

    window.addTagsListeners = function () {
      var tagAllInput = document.querySelector('.filter__item-all input');
      if (tagAllInput) return false; // function filterResetOnClick(event) {
      //     const filterReset = event.currentTarget;
      //     const filterItems = filterReset.parentNode.parentNode.querySelectorAll('.filter__item-check:not(.filter__item-all)');
      //     const filterShowCounter = filterReset.parentNode.querySelector('.filter__show-counter');
      //
      //
      //     filterShowCounter.innerText = '1';
      //     document.querySelector('.filter__item-all input').checked = true;
      //     filterItems.forEach((item) => {
      //         const input = item.querySelector('input');
      //         input.checked = false;
      //     });
      // }

      document.querySelectorAll('.filter').forEach(function (filter) {
        var select = filter.querySelector('.filter__select');

        if (select) {
          var choices = new Choices(select, {
            searchEnabled: false,
            resetScrollPosition: false,
            itemSelectText: ''
          });
        }

        var filterToggle = filter.querySelector('.filter__header'); // const filterReset = filter.querySelector('.filter__reset');

        var filterShow = filter.querySelector('.filter__show');
        var filterShowCounter = filterShow.querySelector('.filter__show-counter');
        var checks = filter.querySelectorAll('.filter__item-check:not(.filter__item-all) input');
        if (window.innerWidth < 1280) filter.classList.add('closed');
        filterShowCounter.innerText = countActiveCheck(filter);
        filterToggle.addEventListener('click', filterTogglerOnClick); // filterReset.addEventListener('click', filterResetOnClick);

        checks.forEach(function (check) {
          check.addEventListener('click', function (event) {
            if (countActiveCheck(filter) === 0) {
              tagAllInput.checked = true;
              return;
            }

            tagAllInput.checked = false;
            filterShowCounter.innerText = countActiveCheck(filter);
          });
        });
        tagAllInput.addEventListener('click', function () {
          if (countActiveCheck(filter) === 0) {
            tagAllInput.checked = true;
            return;
          }

          checks.forEach(function ($check) {
            return $check.checked = false;
          }); // filterReset.parentNode.querySelector('.filter__show-counter').innerHTML = '1';

          filterShowCounter.innerHTML = '1';
        });
      });
    };

    window.addTagsListeners();
    var asideFilters = document.querySelectorAll('.filter_aside');

    if (asideFilters.length <= 0) {
      return false;
    }

    var timeout;
    window.addEventListener('resize', function () {
      clearTimeout(timeout);
      timeout = setTimeout(resizeChangeContent, 50);
    });

    function resizeChangeContent() {
      var filterContainer = document.querySelector('.aside-filter-wrap');
      var mobileContainer = document.querySelector(filterContainer.dataset.mobileContainer);

      if (window.innerWidth < 1280 && !mobileContainer.children.length) {
        mobileContainer.append.apply(mobileContainer, _toConsumableArray(filterContainer.children));
      } else if (window.innerWidth >= 1280 && !filterContainer.children.length) {
        filterContainer.append.apply(filterContainer, _toConsumableArray(mobileContainer.children));
      }
    }

    resizeChangeContent();
  });

  function countActiveCheck(filter) {
    var activeChecksNum = 0;
    filter.querySelectorAll('.filter__item-check input').forEach(function (input) {
      if (input.checked == true) activeChecksNum++;
    });
    return activeChecksNum;
  }

  function filterTogglerOnClick(event) {
    var filter = event.currentTarget.parentNode;
    filter.classList.toggle('closed');

    if (filter.classList.contains('filter_clone')) {
      document.body.classList.toggle('no-scroll');
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.compare')) {
      var rowEqualHeight = function rowEqualHeight() {
        var list = document.querySelector('.compare-sidebar__options');
        var compareItems = document.querySelectorAll('.compare-item');

        var _loop = function _loop(x) {
          // Формируем массив из элементов нужного ряда
          var rowItems = [];
          rowItems.push(list.children[x]);
          compareItems.forEach(function (item) {
            rowItems.push(item.querySelector('.compare-item__options').children[x]);
          }); // Ищем наибольшую высоту и назначаем ее всем элементам ряда

          var height = 0;
          rowItems.forEach(function (item) {
            item.style.height = 'auto';
            height = item.offsetHeight > height ? item.offsetHeight : height;
          });
          rowItems.forEach(function (item) {
            item.style.height = "".concat(height, "px");
          });
        };

        for (var x = 0; x < list.children.length; x++) {
          _loop(x);
        }
      };

      var slider = new Swiper('.compare__slider', {
        slidesPerView: 3,
        spaceBetween: 30,
        speed: 400,
        freeMode: true,
        freeModeMinimumVelocity: 0.4,
        breakpoints: {
          0: {
            slidesPerView: 2,
            spaceBetween: 0,
            freeMode: false
          },
          780: {
            spaceBetween: 12,
            slidesPerView: 2,
            freeMode: true
          },
          992: {
            slidesPerView: 2.6
          },
          1280: {
            slidesPerView: 2.8,
            spaceBetween: 30
          },
          1600: {
            slidesPerView: 3
          }
        },
        navigation: {
          nextEl: '.compare-nav__next',
          prevEl: '.compare-nav__prev'
        },
        scrollbar: {
          el: '.swiper-scrollbar',
          draggable: true
        }
      });

      window.onload = function () {
        return rowEqualHeight();
      };

      var timeout;
      window.addEventListener('resize', function () {
        clearTimeout(timeout);
        timeout = setTimeout(rowEqualHeight, 100);
      });

      var delay = function delay(ms) {
        return new Promise(function (func) {
          return setTimeout(function () {
            return func();
          }, ms);
        });
      };

      var countElem = document.querySelector('.compare-nav__count span');
      var count = document.querySelectorAll('.compare-item').length;
      countElem.innerHTML = count;

      if (count < 2) {
        slider.params.slidesPerView = 1;
        slider.update();
      }

      document.querySelectorAll('.compare-item__check-button').forEach(function (button) {
        button.addEventListener('click', function () {
          var _this = this;

          delay(300).then(function () {
            button.closest('.compare-item').remove();
            $.ajax({
              url: '/ajax/compare.php',
              data: {
                compare: true,
                elem_id: _this.dataset.id,
                iblock_id: _this.dataset.iblockId,
                compare_name: _this.dataset.compareName
              },
              method: 'post',
              dataType: 'json'
            });
            slider.update();
            count = document.querySelectorAll('.compare-item').length;
            countElem.innerHTML = count;

            if (count < 2) {
              slider.params.slidesPerView = 1;
              slider.update();
            }
          });
        });
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.toggle')) {
      document.querySelectorAll('.toggle').forEach(function (button) {
        button.addEventListener('click', function () {
          return button.classList.toggle('toggle_active');
        });
      });
    }

    if (document.querySelector('.toggle-inner')) {
      document.querySelectorAll('.toggle-inner').forEach(function (button) {
        button.addEventListener('click', function () {
          var label = button.parentNode.querySelector('.compare-item__check-text');
          label.innerText = button.classList.contains('toggle_active') ? 'В сравнении' : 'Сравнить';
        });
      });
    }

    if (document.querySelector('.form__toggler')) {
      var formBodies = document.querySelectorAll('.form__toggle-body');
      var timeout;
      window.addEventListener('resize', function (e) {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
          formBodies.forEach(function (formBody) {
            if (window.innerWidth > 1279) {
              formBody.classList.remove('form__toggle-body_hidden');
            }
          });
        }, 100);
      });
      document.querySelectorAll('.form__toggler').forEach(function (toggler) {
        toggler.addEventListener('click', function () {
          if (window.innerWidth > 1279) return false;
          var formBody = toggler.closest('.form').querySelector('.form__toggle-body');
          var arrow = toggler.closest('.form').querySelector('.form__arrow');
          if (arrow) arrow.classList.toggle('form__arrow_active');
          if (formBody) formBody.classList.toggle('form__toggle-body_hidden');
        });
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.simple-slider')) {
      var slider = new Swiper('.simple-slider', {
        spaceBetween: 30,
        slidesPerView: 3,
        navigation: {
          nextEl: '.simple-slider__next',
          prevEl: '.simple-slider__prev'
        },
        pagination: {
          el: '.simple-slider__pagination',
          type: 'bullets',
          clickable: true,
          bulletActiveClass: 'pagination__bullet_active',
          bulletClass: 'pagination__bullet'
        },
        breakpoints: {
          0: {
            slidesPerView: 1
          },
          640: {
            slidesPerView: 2
          },
          992: {
            slidesPerView: 3
          }
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.aside-slider')) {
      var resizeChangeContent = function resizeChangeContent() {
        try {
          var sidebarWrap = document.querySelector(".inner__sidebar [data-content=\"aside-slider\"]");
          var contentWrap = document.querySelector(".inner__content [data-content=\"aside-slider\"]");

          if (window.innerWidth < 1280 && !contentWrap.children.length) {
            contentWrap.append.apply(contentWrap, _toConsumableArray(sidebarWrap.children));
            slider.update();
          } else if (window.innerWidth >= 1280 && !sidebarWrap.children.length) {
            sidebarWrap.append.apply(sidebarWrap, _toConsumableArray(contentWrap.children));
            slider.update();
          }
        } catch (e) {}
      };

      var slider = new Swiper('.aside-slider', {
        loop: true,
        autoHeight: true,
        autoplay: {
          delay: 4000
        },
        pagination: {
          el: '.aside-slider__pagination',
          type: 'bullets',
          clickable: true,
          bulletClass: 'pagination__bullet',
          bulletActiveClass: 'pagination__bullet_active'
        }
      });
      resizeChangeContent();
      var timeout;
      window.addEventListener('resize', function () {
        clearTimeout(timeout);
        timeout = setTimeout(resizeChangeContent, 50);
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.order')) {
      document.querySelectorAll('.header-basket').forEach(function (button) {
        button.addEventListener('click', function () {
          document.querySelector('.header-mobile').classList.remove('header-mobile_open');
          document.querySelector('.dark').classList.remove('dark_visible');
          var window_scroll = window.pageYOffset;

          if (document.querySelector('.order_open')) {
            document.querySelector('.order').classList.remove('order_open');
            document.querySelector('.order').classList.remove('order_open__fixed-header');
            document.body.classList.remove('no-scroll');
            document.querySelectorAll('.header-basket__wrap').forEach(function (item) {
              item.classList.remove('header-basket__wrap_active');
            });
          } else {
            document.querySelector('.order').classList.add('order_open');

            if (window_scroll >= 140) {
              document.querySelector('.order').classList.add('order_open__fixed-header');
            }

            document.body.classList.add('no-scroll');
            document.querySelectorAll('.header-basket__wrap').forEach(function (item) {
              item.classList.add('header-basket__wrap_active');
            });
          }

          if (document.querySelector('.header-dark_visible')) {
            document.querySelector('.header-dark').classList.remove('header-dark_visible');
          }
        });
      });
      document.querySelector('.order__close').addEventListener('click', function () {
        this.closest('.order').classList.remove('order_open');
        this.closest('.order').classList.remove('order_open__fixed-header');
        document.body.classList.remove('no-scroll');
        document.querySelectorAll('.header-basket__wrap').forEach(function (item) {
          item.classList.remove('header-basket__wrap_active');
        });
      }); // document.querySelector('.order-items__list').addEventListener('click', function (e) {
      //   if (e.target.closest('.order-items__count')) {
      //     var counterElem = e.target.closest('.order-items__count');
      //     var count = counterElem.querySelector('.order-items__value');
      //     var countValue = Number(count.innerHTML);
      //
      //     if (e.target.closest('.order-items__minus')) {
      //       countValue--;
      //       count.innerHTML = countValue < 1 ? 1 : countValue;
      //     } else if (e.target.closest('.order-items__plus')) {
      //       countValue++;
      //       count.innerHTML = countValue;
      //     }
      //   }
      // });

      document.body.addEventListener('click', function (e) {
        if (e.target && e.target.closest('.order-items__count')) {
          var counterElem = e.target.closest('.order-items__count');
          var count = counterElem.querySelector('.order-items__value');
          var countValue = Number(count.innerHTML);

          if (e.target && e.target.closest('.order-items__minus')) {
            countValue--;
            count.innerHTML = countValue < 1 ? 1 : countValue;
          } else if (e.target && e.target.closest('.order-items__plus')) {
            countValue++;
            count.innerHTML = countValue;
          }
        }
      });
      document.querySelectorAll('.order-items__delete').forEach(function (button) {
        button.addEventListener('click', function () {
          var _this = this;

          this.closest('.order-items__item').classList.add('order-items__item_deleted');
          setTimeout(function () {
            _this.closest('.order-items__item').remove();
          }, 250);
        });
      });
      document.addEventListener('click', function (e) {
        if (document.querySelector('.order_open') && !e.target.closest('.order') && !e.target.closest('.header-basket')) {
          // document.querySelector('.order').classList.remove('order_open');
          // document.body.classList.remove('no-scroll');
          document.querySelectorAll('.header-basket__wrap').forEach(function (item) {
            item.classList.remove('header-basket__wrap_active');
          });
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {

    function pauseVideo(elem) {
      elem.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    }

    if (document.querySelector('.product-card')) {
      var sliderThumbs = new Swiper('.product-card-thumbs', {
        spaceBetween: 5,
        loop: true,
        slidesPerView: 4,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
          nextEl: '.product-card-thumbs__next',
          prevEl: '.product-card-thumbs__prev'
        },
        breakpoints: {
          0: {
            direction: 'horizontal'
          },
          640: {
            direction: 'vertical'
          }
        }
      });
      var slider = new Swiper('.product-card-slider', {
        loop: true,
        spaceBetween: 20,
        navigation: {
          nextEl: '.product-card-slider__next',
          prevEl: '.product-card-slider__prev'
        },
        thumbs: {
          swiper: sliderThumbs
        }
      });
      slider.on('slideChangeTransitionStart', function () {
        var previosSlide = slider.slides[slider.previousIndex];

        if (previosSlide.querySelector('iframe')) {
          pauseVideo(previosSlide.querySelector('iframe'));
        }
      });

      if (document.querySelector('.popup-slider')) {
        var popupThumbs = new Swiper('.popup-slider__thumbs', {
          spaceBetween: 10,
          slidesPerView: 'auto',
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
          observer: true,
          observeParents: true,
          navigation: {
            nextEl: '.popup-slider__thumbs-next',
            prevEl: '.popup-slider__thumbs-prev'
          }
        });
        var popupSlider = new Swiper('.popup-slider__main', {
          spaceBetween: 0,
          slidesPerView: 1,
          observer: true,
          observeParents: true,
          allowTouchMove: true,
          zoom: true,
          loop: true,
          navigation: {
            nextEl: '.popup-slider__main-next',
            prevEl: '.popup-slider__main-prev',
            disabledClass: 'popup-slider__main-arrow_disabled'
          },
          thumbs: {
            swiper: popupThumbs
          }
        });
        popupSlider.on('slideChangeTransitionStart', function () {
          var previosSlide = popupSlider.slides[popupSlider.previousIndex];

          if (previosSlide.querySelector('iframe')) {
            pauseVideo(previosSlide.querySelector('iframe'));
          }
        });
        document.querySelectorAll('.product-card-slider__item').forEach(function (item) {
          item.addEventListener('click', function () {
            try {
              var slideIndex = slider.activeIndex;
              popupSlider.update();
              popupSlider.slideTo(slideIndex - 1, 0);
            } catch (error) {}
          });
        });
      }

      if (document.querySelector('.specific-complect')) {
        window.onload = function () {
          if (window.innerWidth <= 560) {
            var items = document.querySelectorAll('.specific-complect__item');
            var height = 0;
            items.forEach(function (item) {
              var itemHeight = item.querySelector('img').offsetHeight;
              height = height < itemHeight ? itemHeight : height;
            });
            items.forEach(function (item) {
              item.querySelector('.specific-complect__wrap').style.height = "".concat(height, "px");
            });
          }
        };
      }

      if (document.querySelector('.documents-slider')) {
        var docsSlider = new Swiper('.documents-slider__container', {
          slidesPerView: 4,
          spaceBetween: 30,
          observer: true,
          observeParents: true,
          pagination: {
            el: '.documents-slider__pagination',
            clickable: true,
            bulletClass: 'pagination__bullet',
            bulletActiveClass: 'pagination__bullet_active'
          },
          navigation: {
            nextEl: '.documents-slider__next',
            prevEl: '.documents-slider__prev'
          },
          breakpoints: {
            0: {
              slidesPerView: 1
            },
            480: {
              slidesPerView: 2
            },
            560: {
              slidesPerView: 3
            },
            991: {
              slidesPerView: 4
            }
          }
        });
        var timeout;
        window.addEventListener('resize', function () {
          clearTimeout(timeout);
          timeout = setTimeout(function () {
            docsSlider.update();
          }, 50);
        });
      }

      if (document.querySelector('.product-card__title')) {
        var changeTitlePosOnResize = function changeTitlePosOnResize() {
          if (window.innerWidth < 992 && isTitleRight) {
            leftContainer.prepend(title);
            isTitleRight = false;
          } else if (window.innerWidth >= 992 && !isTitleRight) {
            rightContainer.prepend(title);
            isTitleRight = true;
          }
        };

        var title = document.querySelector('.product-card__title');
        var leftContainer = document.querySelector('.product-card__top');
        var rightContainer = document.querySelector('.product-card__right');
        var isTitleRight = true;
        changeTitlePosOnResize();

        var _timeout;

        window.addEventListener('resize', function () {
          clearTimeout(_timeout);
          _timeout = setTimeout(function () {
            changeTitlePosOnResize();
          }, 100);
        });
      }
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.tabs')) {
      var tabsSliderInit = function tabsSliderInit() {
        if (tabsWidth > tabsWrapperWidth && tabsSlider === false) {
          tabsSlider = new Swiper('.tabs', {
            slidesPerView: 5,
            spaceBetween: 25,
            navigation: {
              nextEl: '.tabs-nav__next',
              prevEl: '.tabs-nav__prev',
              disabledClass: 'tabs-nav__arrow_hide'
            },
            breakpoints: {
              0: {
                spaceBetween: 15,
                slidesPerView: 2
              },
              480: {
                slidesPerView: 3
              },
              780: {
                spaceBetween: 25,
                slidesPerView: 4
              },
              991: {
                slidesPerView: 5
              },
              1280: {
                slidesPerView: 6
              },
              1600: {
                slidesPerView: 8
              }
            }
          });
        }
      };

      var tabsSlider = false;
      var tabsWidth = 0;
      var tabsWrapperWidth = document.querySelector('.tabs__wrapper').offsetWidth;
      document.querySelectorAll('.tabs-item').forEach(function (item) {
        var margin = window.getComputedStyle(item, null).getPropertyValue("margin-right");
        margin = Number(margin.slice(0, -2));
        tabsWidth += item.offsetWidth + margin;
        item.addEventListener('click', function () {
          var groupItems = this.parentElement.children;
          var groupName = this.dataset.tabGroup;
          var contentId = this.dataset.tab;
          var groupContentItems = document.querySelectorAll(".tabs__content[data-tab-group=\"".concat(groupName, "\"]"));
          Array.from(groupItems).forEach(function (groupItem) {
            groupItem.classList.remove('tabs-item_active');
          });
          groupContentItems.forEach(function (contentItem) {
            contentItem.classList.remove('tabs__content_active');
          });
          document.querySelector(".tabs__content[data-tab=\"".concat(contentId, "\"]")).classList.add('tabs__content_active');
          this.classList.add('tabs-item_active');
        });
      });
      tabsSliderInit();
      var timeout;
      window.addEventListener('resize', function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
          tabsWidth = 0;
          tabsWrapperWidth = document.querySelector('.tabs__wrapper').offsetWidth;
          document.querySelectorAll('.tabs-item').forEach(function (item) {
            tabsWidth += item.offsetWidth + 30;
          });
          tabsSliderInit();
        }, 100);
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    var labelIdle = "<div class=\"file-input__text\"><span>\u041F\u0440\u0438\u043A\u0440\u0435\u043F\u0438\u0442\u0435 \u0444\u0430\u0439\u043B</span> \u0441 \u043E\u043F\u0440\u043E\u0441\u043D\u044B\u043C \u043B\u0438\u0441\u0442\u043E\u043C \u0441 \u0443\u0441\u0442\u0440\u043E\u0439\u0441\u0442\u0432\u0430 \u0438\u043B\u0438 \u043F\u0435\u0440\u0435\u0442\u044F\u043D\u0438\u0442\u0435 \u0435\u0433\u043E \u0432 \u044D\u0442\u043E \u043F\u043E\u043B\u0435</div>";
    var iconFile = "\n  <svg width=\"34\" height=\"44\" viewBox=\"0 0 34 44\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n    <path d=\"M33.9601 0H0V43.7522H33.9601V0Z\" fill=\"#025BFF\"/>\n    <path d=\"M3.34839 29.4116C4.11438 29.2816 5.02501 29.1855 6.02243 29.1855C7.82986 29.1855 9.11657 29.6535 9.96934 30.5443C10.8372 31.434 11.3428 32.6955 11.3428 34.4578C11.3428 36.2371 10.851 37.6932 9.94041 38.6958C9.02978 39.7155 7.52673 40.2661 5.63252 40.2661C4.73572 40.2661 3.98357 40.2163 3.34839 40.1361V29.4116ZM4.60617 39.0507C4.92439 39.1164 5.38725 39.1334 5.87904 39.1334C8.56818 39.1334 10.0285 37.4501 10.0285 34.5077C10.0423 31.9347 8.74175 30.3013 6.08154 30.3013C5.43127 30.3013 4.93948 30.3669 4.60617 30.4459V39.0507Z\" fill=\"white\"/>\n    <path d=\"M21.7397 34.601C21.7397 38.354 19.7009 40.3435 17.2142 40.3435C14.6408 40.3435 12.8334 38.1121 12.8334 34.8112C12.8334 31.3499 14.7565 29.0857 17.3589 29.0857C20.0178 29.0869 21.7397 31.3657 21.7397 34.601ZM14.1779 34.7796C14.1779 37.1082 15.3049 39.195 17.2859 39.195C19.2808 39.195 20.409 37.1411 20.409 34.6654C20.409 32.4984 19.3965 30.233 17.2998 30.233C15.2181 30.2342 14.1779 32.3854 14.1779 34.7796Z\" fill=\"white\"/>\n    <path d=\"M30.6171 39.8097C30.1542 40.0685 29.2298 40.3274 28.0437 40.3274C25.2967 40.3274 23.2289 38.3865 23.2289 34.8123C23.2289 31.4009 25.2967 29.0869 28.3179 29.0869C29.5329 29.0869 30.2989 29.3774 30.6309 29.5718L30.3265 30.7203C29.8498 30.4614 29.1706 30.267 28.3606 30.267C26.0752 30.267 24.5584 31.9004 24.5584 34.7637C24.5584 37.4325 25.9319 39.1473 28.3028 39.1473C29.07 39.1473 29.8498 38.9687 30.3567 38.694L30.6171 39.8097Z\" fill=\"white\"/>\n    <path d=\"M33.9999 8.50757H25.2222V0L33.9999 8.50757Z\" fill=\"white\"/>\n  </svg>";
    var iconRemove = "\n  <svg class=\"file-input__icon\" fill=\"none\" aria-hidden=\"true\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" xmlns=\"http://www.w3.org/2000/svg\">\n    <rect x=\"0.5\" y=\"3\" width=\"16\" height=\"4\" rx=\"2\" stroke=\"#999999\"/>\n    <path d=\"M2.5 7H14.5V18.5C14.5 19.3284 13.8284 20 13 20H4C3.17157 20 2.5 19.3284 2.5 18.5V7Z\" stroke=\"#999999\"/>\n    <path d=\"M5.5 17.5C5.77619 17.5 6 17.2628 6 16.9701V11.0299C6 10.7372 5.77619 10.5 5.5 10.5C5.22381 10.5 5 10.7372 5 11.0299V16.9701C5 17.2628 5.22381 17.5 5.5 17.5Z\" fill=\"#999999\"/>\n    <path d=\"M8.5 17.5C8.77619 17.5 9 17.2628 9 16.9701V11.0299C9 10.7372 8.77619 10.5 8.5 10.5C8.22381 10.5 8 10.7372 8 11.0299V16.9701C8.00476 17.2628 8.22857 17.5 8.5 17.5Z\" fill=\"#999999\"/>\n    <path d=\"M11.5 17.5C11.7762 17.5 12 17.2628 12 16.9701V11.0299C12 10.7372 11.7762 10.5 11.5 10.5C11.2238 10.5 11 10.7372 11 11.0299V16.9701C11 17.2628 11.2238 17.5 11.5 17.5Z\" fill=\"#999999\"/>\n    <path d=\"M11.2716 2.35195C11.3581 2.56077 11.4205 2.77819 11.458 3H8.5L5.54196 3C5.57945 2.77819 5.64187 2.56077 5.72836 2.35195C5.87913 1.98797 6.1001 1.65726 6.37868 1.37868C6.65726 1.1001 6.98797 0.879125 7.35195 0.728361C7.71593 0.577597 8.10603 0.5 8.5 0.5C8.89397 0.5 9.28407 0.577597 9.64805 0.728361C10.012 0.879125 10.3427 1.1001 10.6213 1.37868C10.8999 1.65726 11.1209 1.98797 11.2716 2.35195Z\" stroke=\"#999999\"/>\n  </svg>";

    var Item = function Item(text, id) {
      return "<div class=\"file-input__file\" id=\"".concat(id, "\">\n      <div class=\"file-input__file-left\">\n        \n        <div class=\"file-input__file-icon\">").concat(iconFile, "</div>\n         \n        <span class=\"file-input__list-text\">").concat(text.length > 25 ? text.slice(0, 25) + '...' : text, "</span>\n      </div>     \n      <div class=\"file-input__file-icon-wrap\"> \n        ").concat(iconRemove, "\n      </div>\n    </div>");
    };

    if (document.querySelectorAll('.file-input').length > 0) {
      document.querySelectorAll('.file-input').forEach(function (item) {
        var _item$querySelector;

        var fileInput = item.querySelector('input[type="file"]');
        var labelText = (_item$querySelector = item.querySelector('.file-input-text-wrap')) === null || _item$querySelector === void 0 ? void 0 : _item$querySelector.innerHTML;
        var container = item; // если есть .file-input-text-wrap, то его внутренности используются для лейбла

        labelIdle = labelText ? labelText : labelIdle;

        if (container) {
          var input = FilePond.create(fileInput, {
            labelIdle: labelIdle,
            maxFiles: 2
          });
          var root = container.querySelector('.filepond--root');
          if (!root) return false;
          root.addEventListener('FilePond:addfile', function (e) {
            var fileWrapper = container.closest('.file-input__file-wrap');
            var html = !fileWrapper ? "<div class=\"file-input__file-wrap\">".concat(Item(e.detail.file.filename, e.detail.file.id), "</div>") : Item(e.detail.file.filename, e.detail.file.id);
            container.insertAdjacentHTML("afterbegin", html); // container = container.querySelector('.file-input__file-wrap');
          });
          container.addEventListener('click', function (event) {
            if (event.target.closest('.file-input__icon')) {
              var fileContainer = event.target.closest('.file-input__file');
              var fileId = fileContainer.getAttribute('id');
              input.removeFile(fileId);
              fileContainer.remove();
            }
          });
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.card-slider')) {
      var cardSlider = new Swiper('.card-slider__container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 400,
        breakpoints: {
          0: {
            slidesPerView: 'auto'
          },
          780: {
            slidesPerView: 3
          },
          1280: {
            slidesPerView: 4
          }
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    new WOW().init();
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.career-slider')) {
      var slider = new Swiper('.career-slider', {
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        navigation: {
          nextEl: '.career-slider-nav__next',
          prevEl: '.career-slider-nav__prev',
          disabledClass: 'career-slider-nav__arrow_disabled'
        }
      });
      document.querySelectorAll('.card[data-popup="career"]').forEach(function (item, index) {
        item.addEventListener('click', function () {
          slider.slideTo(index, 0);
        });
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.contacts-map')) {
      var init = function init() {
        var startX = parseFloat(document.querySelectorAll('.swiper-slide.tabs-item')[0].getAttribute('data-map-x'));
        var startY = parseFloat(document.querySelectorAll('.swiper-slide.tabs-item')[0].getAttribute('data-map-y'));
        myMap = new ymaps.Map('contacts-map', {
          center: [startX, startY],
          zoom: 16,
          controls: [],
          suppressMapOpenBlock: true
        });

        if ($(window).width() < '990') {
          //Запрещаем скролл на мобилках + выводим уведомление о том, как правильно скроллить.
          myMap.behaviors.disable('drag');
          myMap.events.add('multitouchstart', function (e) {
            $('.am_map_alert').css({
              "opacity": "0"
            });
          });
        }

        var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {}, {
          iconLayout: 'default#image',
          iconImageHref: '/local/templates/vector/img/contacts/point.svg',
          iconImageSize: [75, 92],
          iconImageOffset: [-37, -92]
        }),
            ZoomLayout = ymaps.templateLayoutFactory.createClass("<div class='contacts-map__zoom'>" + "<div class='contacts-map__zoom-in'>+</div>" + "<div class='contacts-map__zoom-out'>-</div>" + "</div>", {
          build: function build() {
            ZoomLayout.superclass.build.call(this);
            this.zoomInCallback = ymaps.util.bind(this.zoomIn, this);
            this.zoomOutCallback = ymaps.util.bind(this.zoomOut, this);
            document.querySelector('.contacts-map__zoom-in').addEventListener('click', this.zoomInCallback);
            document.querySelector('.contacts-map__zoom-out').addEventListener('click', this.zoomOutCallback);
          },
          zoomIn: function zoomIn() {
            var map = this.getData().control.getMap();
            map.setZoom(map.getZoom() + 1, {
              checkZoomRange: true
            });
          },
          zoomOut: function zoomOut() {
            var map = this.getData().control.getMap();
            map.setZoom(map.getZoom() - 1, {
              checkZoomRange: true
            });
          }
        }),
            zoomControl = new ymaps.control.ZoomControl({
          options: {
            layout: ZoomLayout
          }
        });
        myMap.controls.add(zoomControl);
        myMap.geoObjects.add(myPlacemark);
        myMap.behaviors.disable(['scrollZoom']);
        var tabs = document.querySelectorAll('.swiper-slide.tabs-item');

        var _iterator = _createForOfIteratorHelper(tabs),
            _step;

        try {
          var _loop = function _loop() {
            var tab = _step.value;
            var x = parseFloat(tab.getAttribute('data-map-x'));
            var y = parseFloat(tab.getAttribute('data-map-y'));
            var NewPlacemark = new ymaps.Placemark([x, y], {}, {
              iconLayout: 'default#image',
              iconImageHref: '/local/templates/vector/img/contacts/point.svg',
              iconImageSize: [75, 92],
              iconImageOffset: [-37, -92]
            });
            myMap.geoObjects.add(NewPlacemark);
            tab.addEventListener('click', function (e) {
              myMap.panTo([x, y], {
                flying: true,
                duration: 2000
              });
            });
          };

          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            _loop();
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      };

      var myMap;
      ymaps.ready(init);
    }
  });

  document.addEventListener('DOMContentLoaded', function () {

    function pauseVideo(elem) {
      elem.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    }

    if (document.querySelector('.news-detail-gallery')) {
      var sliderThumbs = new Swiper('.news-detail-gallery__thumbs', {
        spaceBetween: 10,
        // loop: true,
        slidesPerView: 'auto',
        watchSlidesVisibility: true,
        watchSlidesProgress: true
      });
      var slider = new Swiper('.news-detail-gallery__slider', {
        // loop: true,
        spaceBetween: 0,
        navigation: {
          nextEl: '.news-detail-gallery__next',
          prevEl: '.news-detail-gallery__prev',
          disabledClass: 'news-detail-gallery__arrow_disabled'
        },
        thumbs: {
          swiper: sliderThumbs
        }
      });
      slider.on('slideChangeTransitionStart', function () {
        var previosSlide = slider.slides[slider.previousIndex];

        if (previosSlide.querySelector('iframe')) {
          pauseVideo(previosSlide.querySelector('iframe'));
        }
      });

      if (document.querySelector('.popup-slider')) {
        var popupThumbs = new Swiper('.popup-slider__thumbs', {
          spaceBetween: 10,
          slidesPerView: 'auto',
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
          observer: true,
          observeParents: true,
          navigation: {
            nextEl: '.popup-slider__thumbs-next',
            prevEl: '.popup-slider__thumbs-prev'
          }
        });
        var popupSlider = new Swiper('.popup-slider__main', {
          spaceBetween: 0,
          slidesPerView: 1,
          observer: true,
          observeParents: true,
          allowTouchMove: true,
          zoom: true,
          loop: true,
          navigation: {
            nextEl: '.popup-slider__main-next',
            prevEl: '.popup-slider__main-prev',
            disabledClass: 'popup-slider__main-arrow_disabled'
          },
          thumbs: {
            swiper: popupThumbs
          }
        });
        popupSlider.on('slideChangeTransitionStart', function () {
          var previosSlide = popupSlider.slides[popupSlider.previousIndex];

          if (previosSlide.querySelector('iframe')) {
            pauseVideo(previosSlide.querySelector('iframe'));
          }
        });
        document.querySelectorAll('.news-detail-gallery__slide').forEach(function (item) {
          item.addEventListener('click', function () {
            try {
              var slideIndex = slider.activeIndex;
              popupSlider.update();
              popupSlider.slideTo(slideIndex + 1, 0);
            } catch (error) {}
          });
        });
      }
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.content-slider__slider')) {
      var contentSlider = new Swiper('.content-slider__slider', {
        slidesPerView: 1,
        loop: true,
        navigation: {
          nextEl: '.content-slider__next',
          prevEl: '.content-slider__prev'
        }
      });
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#map')) {
      var init = function init() {
        var myMap = new ymaps.Map("map", {
          center: [55.76, 37.64],
          zoom: 4,
          controls: []
        }),
            objectManager = new ymaps.ObjectManager({
          clusterize: true,
          gridSize: 32,
          clusterDisableClickZoom: true,
          hasBalloon: false,
          hasHint: false
        });
        objectManager.objects.options.set('preset', {
          iconLayout: 'default#image',
          iconImageHref: '../img/SVG/point.svg',
          iconImageSize: [24, 32]
        });
        objectManager.clusters.options.set('preset', {
          clusterColor: '#fff',
          clusterIcons: [{
            href: '../img/SVG/ellipse.svg',
            size: [40, 40],
            offset: [-20, -20]
          }, {
            href: '../img/SVG/ellipse.svg',
            size: [80, 80],
            offset: [-40, -40]
          }],
          clusterNumbers: [6]
        });
        myMap.geoObjects.add(objectManager);
        objectManager.add(mapArr);
        myMap.behaviors.disable(['scrollZoom']);
      };

      var mapArr = {
        "type": "FeatureCollection",
        "features": [{
          "type": "Feature",
          "id": 0,
          "geometry": {
            "type": "Point",
            "coordinates": [25.831903, 37.411961]
          }
        }, {
          "type": "Feature",
          "id": 1,
          "geometry": {
            "type": "Point",
            "coordinates": [43.763338, 37.565466]
          }
        }, {
          "type": "Feature",
          "id": 2,
          "geometry": {
            "type": "Point",
            "coordinates": [55.763338, 36.565466]
          }
        }, {
          "type": "Feature",
          "id": 3,
          "geometry": {
            "type": "Point",
            "coordinates": [55.744522, 47.616378]
          }
        }, {
          "type": "Feature",
          "id": 4,
          "geometry": {
            "type": "Point",
            "coordinates": [52.780898, 57.642889]
          }
        }, {
          "type": "Feature",
          "id": 5,
          "geometry": {
            "type": "Point",
            "coordinates": [55.793559, 55.435983]
          }
        }, {
          "type": "Feature",
          "id": 6,
          "geometry": {
            "type": "Point",
            "coordinates": [35.800584, 34.675638]
          }
        }, {
          "type": "Feature",
          "id": 7,
          "geometry": {
            "type": "Point",
            "coordinates": [55.716733, 37.589988]
          }
        }, {
          "type": "Feature",
          "id": 8,
          "geometry": {
            "type": "Point",
            "coordinates": [55.775724, 36.56084]
          }
        }, {
          "type": "Feature",
          "id": 9,
          "geometry": {
            "type": "Point",
            "coordinates": [55.822144, 37.433781]
          }
        }, {
          "type": "Feature",
          "id": 10,
          "geometry": {
            "type": "Point",
            "coordinates": [54.876327, 37.431744]
          }
        }, {
          "type": "Feature",
          "id": 0,
          "geometry": {
            "type": "Point",
            "coordinates": [55.831903, 37.411961]
          }
        }, {
          "type": "Feature",
          "id": 1,
          "geometry": {
            "type": "Point",
            "coordinates": [43.763338, 37.565466]
          }
        }, {
          "type": "Feature",
          "id": 2,
          "geometry": {
            "type": "Point",
            "coordinates": [55.763338, 36.565466]
          }
        }, {
          "type": "Feature",
          "id": 3,
          "geometry": {
            "type": "Point",
            "coordinates": [55.744522, 37.616378]
          }
        }, {
          "type": "Feature",
          "id": 4,
          "geometry": {
            "type": "Point",
            "coordinates": [52.780898, 32.642889]
          }
        }, {
          "type": "Feature",
          "id": 5,
          "geometry": {
            "type": "Point",
            "coordinates": [55.793559, 55.435983]
          }
        }, {
          "type": "Feature",
          "id": 6,
          "geometry": {
            "type": "Point",
            "coordinates": [35.800584, 34.675638]
          }
        }, {
          "type": "Feature",
          "id": 7,
          "geometry": {
            "type": "Point",
            "coordinates": [55.716733, 37.589988]
          }
        }, {
          "type": "Feature",
          "id": 8,
          "geometry": {
            "type": "Point",
            "coordinates": [55.775724, 36.56084]
          }
        }, {
          "type": "Feature",
          "id": 9,
          "geometry": {
            "type": "Point",
            "coordinates": [55.822144, 37.433781]
          }
        }, {
          "type": "Feature",
          "id": 10,
          "geometry": {
            "type": "Point",
            "coordinates": [54.876327, 37.431744]
          }
        }]
      };
      ymaps.ready(init);
    }
  });

  document.setMaxHeight('.card-list .compare-item__name');
  document.setMaxHeight('.card-list .compare__table-wrap');

}));
