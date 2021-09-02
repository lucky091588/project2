import { STATE_CLASS } from '../constants/index';

export default function loader() {

  if(document.querySelector('.home') !== null) {

    let baseUrl = document.querySelector('#js-preload-images').value;
    let preloadImage = document.querySelector('#js-loader-url').value;
    let images = baseUrl.split(",");
    images.pop();
    images.unshift(preloadImage);


    let progress = 0,
      loading = document.querySelector('#js-loading'),
      loadingBar = document.querySelector('.loader-bar'),
      loadingProgress = document.querySelector('.loader-percent'),
      mainWrapper = document.querySelector('.js-wrapper'),
      html = document.querySelector('html'),
      homeWrap = 'l-wrapper--home';

    let interval = setInterval(() => {
      if (progress > 80) {
        clearInterval(interval);
      }
      else {
        loadingBar.style.transform = `scaleX(${progress/100})`;
        loadingProgress.innerText = `${progress}%`;
        progress++;
      }
    }, 3000/80);

    let promises = [];

    for(let i = 0; i < images.length; i++) {
      promises.push(preload(images[i]));
    }

    Promise.all(promises)
      .then(() => {
        let interval2 = setInterval(() => {
          if (progress > 100) {
            clearInterval(interval2);
            loading.style.display = 'none';
            mainWrapper.classList.remove(homeWrap);
            html.classList.remove(STATE_CLASS.SCROLLED)
            html.classList.remove(STATE_CLASS.DISABLE);
            mainWrapper.classList.remove(STATE_CLASS.LOCK);
          }
          else {
            loadingBar.style.transform = `scaleX(${progress/100})`;
            loadingProgress.innerText = `${progress}%`;
          }
            progress++;
          }, 500/(100 - progress));
        });
    }

    function preload(src) {
      return new Promise((resolve, reject) => {
        let image = new Image();
        image.addEventListener('load', resolve);
        image.addEventListener('error', reject);
        image.src = src;
      });
    }

  }
