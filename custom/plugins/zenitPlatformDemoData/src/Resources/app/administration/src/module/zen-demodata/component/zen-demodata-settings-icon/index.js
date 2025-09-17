import template from './zen-demodata-settings-icon.html.twig';
import './zen-demodata-settings-icon.scss';

const { Component } = Shopware;

Component.register('zen-demodata-settings-icon', {
    template,

    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
});
