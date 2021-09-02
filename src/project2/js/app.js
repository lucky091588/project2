
if (process.env.NODE_ENV === 'development') {
  // console.debug('development');
}
import osBrowser from 'components/os-browser';
import infoSlider from 'components/info-slider';
import ellipsis from 'components/ellipsis';
import filterProducts from 'components/filter-products';
import instagramFeed from 'components/instagram-feed';
import toTop from 'components/to-top';
import headerScroll from 'components/header-scroll';
import hamburgerMenu from 'components/hamburger-menu';
import modelButton from 'components/model-button';
import formSubmit from 'components/form-submit';
import table from 'components/table';
import loader from 'components/loader';

osBrowser();
infoSlider();
ellipsis();
filterProducts();
instagramFeed();
toTop();
headerScroll();
hamburgerMenu();
modelButton();
formSubmit();
table();
loader();
