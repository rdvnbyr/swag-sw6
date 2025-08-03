import template from './sendcloud-customs-info.html.twig';

const {Component, Mixin} = Shopware;

Component.register('sendcloud-customs-info', {
    template,

    inject: [
        'sendcloudService'
    ],

    mixins: [
        Mixin.getByName('notification'),
    ],

    props: {
        sendcloudShipmentTypes: {
            type: Array,
            required: true,
            default: []
        },

        sendcloudCountries: {
            type: Array,
            required: true,
            default: []
        },

        sendcloudCustomFields: {
            type: Array,
            required: true,
            default: []
        },

        sendcloudShipmentType: {
            type: String,
            required: true,
            default: ''
        },
    },

    data() {
        return {
            isLoading: true,
            hsCode: '',
            originCountry: '',
            mappedOriginCountry: '',
            mappedHsCode: '',
            shipmentType: '2', // Commercial Goods
            shipmentTypeOptions: [
                {
                    label: this.$tc('send-cloud.customsInfo.none'),
                    value: '',
                },
                {
                    label: this.$tc('send-cloud.customsInfo.shipmentTypes.gift'),
                    value: '0',
                },
                {
                    label: this.$tc('send-cloud.customsInfo.shipmentTypes.documents'),
                    value: '1',
                },
                {
                    label: this.$tc('send-cloud.customsInfo.shipmentTypes.commercialGoods'),
                    value: '2',
                },
                {
                    label: this.$tc('send-cloud.customsInfo.shipmentTypes.commercialSample'),
                    value: '3',
                },
                {
                    label: this.$tc('send-cloud.customsInfo.shipmentTypes.returnedGoods'),
                    value: '4',
                },
            ],
        }
    },

    created: function () {
        this.getCustomsConfig();
    },

    methods: {
        getCustomsConfig() {
            return this.sendcloudService.getCustomsInfo()
                .then((configData) => {
                        if (configData.hasOwnProperty('shipmentType') && configData.hasOwnProperty('hsCode') &&
                            configData.hasOwnProperty('originCountry') && configData.hasOwnProperty('mappedHsCode') &&
                            configData.hasOwnProperty('mappedOriginCountry')) {

                            this.shipmentType = configData.shipmentType;
                            this.originCountry = configData.originCountry;
                            this.hsCode = configData.hsCode;
                            this.mappedHsCode = configData.mappedHsCode;
                            this.mappedOriginCountry = configData.mappedOriginCountry;

                        }
                        this.isLoading = false;
                    }
                ).catch(error => {
                    this.isLoading = false;
                });
        },

        saveConfiguration() {
            this.isLoading = true;

            let customInfoObject = {};
            customInfoObject['shipmentType'] = this.shipmentType;
            customInfoObject['originCountry'] = this.originCountry;
            customInfoObject['hsCode'] = this.hsCode;
            customInfoObject['mappedHsCode'] = this.mappedHsCode;
            customInfoObject['mappedOriginCountry'] = this.mappedOriginCountry;

            return this.sendcloudService.saveCustomsInfo(customInfoObject)
                .then((response) => {
                        this.getCustomsConfig();
                        this.createNotificationSuccess({
                            title: this.$tc('global.default.success'),
                            message: this.$tc('send-cloud.customsInfo.successfulSaveMessage')
                        });
                    }
                ).catch(error => {
                    this.isLoading = false;
                    this.createNotificationError({
                        message: error
                    });
                });
        },

        //deletes blur event listener attached by Shopware
        deleteBlurListener() {
            let hsCodeField = document.getElementById('hsCode');

            if (hsCodeField) {
                hsCodeField.addEventListener('focus', function () {
                    hsCodeField.addEventListener('blur', (event) => {
                        event.stopPropagation();
                        event.preventDefault();
                    }, true);
                }, true);

                hsCodeField.addEventListener('blur', function () {
                    hsCodeField.removeEventListener('blur', (event) => {
                        event.stopPropagation();
                        event.preventDefault();
                    }, true);
                }, true);
            }
        }
    }
});
