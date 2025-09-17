import './page/zen-demodata-index';
import './component/zen-demodata-settings-icon';

import deDE from './snippet/de-DE.json';
import enGB from './snippet/en-GB.json';

const { Module } = Shopware;

Module.register('zen-demodata', {
    type: 'plugin',
    name: 'demodata',
    title: 'zen-demodata.general.menuItem',
    description: 'zen-demodata.general.description',
    color: '#242734',
    icon: 'default-shopping-paper-bag-product',

    snippets: {
        'de-DE': deDE,
        'en-GB': enGB,
    },

    routes: {
        index: {
            component: 'zen-demodata-index',
            path: 'index',
        },
    },

    navigation: [
        {
            id: 'zen-demodata',
            label: 'zen-demodata.general.menuItem',
            color: '#242734',
            path: 'zen.demodata.index',
            icon: 'default-shopping-paper-bag-product',
            position: 1000,
            parent: 'sw-content',
        },
    ],

    settingsItem: [
        {
            name: 'zen-demodata',
            to: 'zen.demodata.index',
            group: 'plugins',
            icon: 'regular-tools',
            iconComponent: 'zen-demodata-settings-icon',
            label: 'zen-demodata.general.menuItem',
        },
    ],
});
