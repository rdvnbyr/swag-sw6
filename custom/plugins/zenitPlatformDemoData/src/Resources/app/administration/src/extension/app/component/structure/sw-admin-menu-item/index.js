import template from './sw-admin-menu-item.html.twig';
import './sw-admin-menu-item.scss';

const { Component } = Shopware;

Component.override('sw-admin-menu-item', {
    template,

    methods: {
        isDemodata(path) {
            if (typeof path !== 'undefined') {
                if (path.includes('zen.demodata')) return true;
            }

            return false;
        },
    },
});
