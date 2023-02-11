import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import ajax from '@imacrayon/alpine-ajax'

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.plugin(ajax);

Alpine.start();

Alpine.directive('cleanup', (el, {}, {cleanup}) => {
    cleanup(_ => {
        el._x_model.set(undefined)
    })
});

import './builder';
