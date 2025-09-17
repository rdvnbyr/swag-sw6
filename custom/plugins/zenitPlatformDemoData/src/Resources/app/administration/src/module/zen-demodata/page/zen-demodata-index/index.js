import template from './index.html.twig';
import './index.scss';
import composerJson from '../../../../../../../../../composer.json';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;
const httpClient = Shopware.Application.getContainer('init').httpClient;

Component.register('zen-demodata-index', {
    template,

    inject: ['repositoryFactory', 'loginService'],

    mixins: [Mixin.getByName('notification')],

    computed: {
        pluginRepository() {
            return this.repositoryFactory.create('plugin');
        },

        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },

        themeInstalled() {
            return this.checkThemes();
        },

        getDemos() {
            return this.demos;
        },
    },

    data() {
        return {
            plugin: {},
            pluginJson: composerJson,
            isLoading: false,
            demoIndex: 0,
            importSuccess: false,
            removeSuccess: false,
            previewImage: 'horizon-1-preview',
            disabled: '',
            demos: [
                'horizon-1',
                'horizon-2',
                'horizon-3',
                'gravity-1',
                'gravity-2',
                'sphere-1',
                'sphere-2',
                'atmos-1',
                'atmos-2',
                'atmos-3',
                'atmos-4',
                'stratus-1',
                'stratus-2',
                'stratus-3',
                'stratus-4',
            ],
            demoValues: [
                {
                    value: 0,
                    label: 'Horizon Demo - Set 1',
                },
                {
                    value: 1,
                    label: 'Horizon Demo - Set 2',
                },
                {
                    value: 2,
                    label: 'Horizon Demo - Set 3',
                },
                {
                    value: 3,
                    label: 'Gravity Demo - Set 1',
                },
                {
                    value: 4,
                    label: 'Gravity Demo - Set 2',
                },
                {
                    value: 5,
                    label: 'Sphere Demo - Set 1',
                },
                {
                    value: 6,
                    label: 'Sphere Demo - Set 2',
                },
                {
                    value: 7,
                    label: 'Atmos Demo - Set 1',
                },
                {
                    value: 8,
                    label: 'Atmos Demo - Set 2',
                },
                {
                    value: 9,
                    label: 'Atmos Demo - Set 3',
                },
                {
                    value: 10,
                    label: 'Atmos Demo - Set 4',
                },
                {
                    value: 11,
                    label: 'Stratus Demo - Set 1',
                },
                {
                    value: 12,
                    label: 'Stratus Demo - Set 2',
                },
                {
                    value: 13,
                    label: 'Stratus Demo - Set 3',
                },
                {
                    value: 14,
                    label: 'Stratus Demo - Set 4',
                },
            ],
            selected: {
                demo: 'horizon-1',
                homeLayout: true,
                productLayout1: true,
                productLayout2: false,
                productLayout3: false,
                productLayout4: false,
                productLayout5: false,
                categoryLayout: true,
                categoryLayoutSidebar: false,
                categoryLayoutHeader: false,
                categoryLayoutHeaderSidebar: false,
                products: true,
            },
        };
    },

    created() {
        this.getPlugin();
    },

    metaInfo() {
        return {
            title: this.$createTitle(),
        };
    },

    methods: {
        getPlugin() {
            const pluginClass =
                this.pluginJson['extra']['shopware-plugin-class'];
            const pluginName = pluginClass.slice(
                pluginClass.lastIndexOf('\\') + 1
            );

            this.isLoading = true;

            const pluginCriteria = new Criteria();
            pluginCriteria.addFilter(
                Criteria.equals('plugin.name', pluginName)
            );

            this.pluginRepository
                .search(pluginCriteria, Shopware.Context.api)
                .then((searchResult) => {
                    this.plugin = searchResult.first();

                    if (this.plugin.translated.changelog) {
                        this.getOrderedChangelog(
                            this.plugin.translated.changelog
                        );
                    }

                    this.isLoading = false;
                });
        },

        //check if at least one zenit plugin is installed
        checkThemes() {
            const bundles = Shopware.Context.app.config.bundles;
            let themeNames = [
                'zenitPlatformAtmos',
                'zenitPlatformGravity',
                'zenitPlatformHorizon',
                'zenitPlatformSphere',
                'zenitPlatformStratus',
            ];

            for (const key in bundles) {
                if (themeNames.includes(key)) {
                    return true;
                }
            }

            return false;
        },

        selectDemo() {
            this.importSuccess = false;
            this.removeSuccess = false;
            this.selected.demo = this.demos[Number(this.demoIndex)];
            this.previewImage = this.demos[Number(this.demoIndex)] + '-preview';
        },

        getBasicHeaders(additionalHeaders = {}) {
            const basicHeaders = {
                Accept: 'application/json',
                Authorization: `Bearer ${this.loginService.getToken()}`,
                'Content-Type': 'application/json',
            };

            return { ...basicHeaders, ...additionalHeaders };
        },

        installData() {
            this.importSuccess = false;
            this.removeSuccess = false;
            this.disabled = 'zen-disabled';
            this.isLoading = true;

            httpClient({
                method: 'post',
                headers: this.getBasicHeaders(),
                url: '/zen/demodata/install',
                responseType: 'json',
                data: this.selected,
            })
                .then((response) => {
                    this.createNotificationSuccess({
                        message: this.$tc(
                            'zen-demodata.messages.success.importSuccess'
                        ),
                    });
                    this.isLoading = false;
                    this.importSuccess = true;
                })
                .catch((error) => {
                    this.createNotificationError({
                        title: this.$tc('global.default.error'),
                        message: this.$tc(
                            'zen-demodata.messages.error.importError'
                        ),
                    });
                    this.isLoading = false;
                    this.disabled = '';
                });
        },

        removeData() {
            this.importSuccess = false;
            this.removeSuccess = false;
            this.disabled = 'zen-disabled';
            this.isLoading = true;

            httpClient({
                method: 'post',
                headers: this.getBasicHeaders(),
                url: '/zen/demodata/remove',
                responseType: 'json',
                data: this.selected,
            })
                .then((response) => {
                    this.createNotificationSuccess({
                        message: this.$tc(
                            'zen-demodata.messages.success.deleteSuccess'
                        ),
                    });
                    this.isLoading = false;
                    this.removeSuccess = true;
                })
                .catch((error) => {
                    this.createNotificationError({
                        title: this.$tc('global.default.error'),
                        message: this.$tc(
                            'zen-demodata.messages.error.deleteError'
                        ),
                    });
                    this.isLoading = false;
                    this.disabled = '';
                });
        },
    },
});
