import Instafeed from 'instafeed.js';

export default function instagramFeed() {

  const instaContainer  = 'js-instagram-feed',
        $instaContainer = document.querySelectorAll('#'+instaContainer);

  if($instaContainer.length) {
    const userFeed = new Instafeed({
        get: 'user',
        userId: '9518498682',
        accessToken: '9518498682.6a4d4c9.109d0a7568324b72b10ef9297e7d13c6',
        target: instaContainer,
        resolution: 'low_resolution',
        limit: '10',
        template: `<li class="instagram-feed__item">
                    <a class="instagram-feed__link" href="{{link}}" target="_blank" title="{{caption}}" style="background-image: url({{image}})"></a>
                  </li>`
    });
    userFeed.run();
  }

}
