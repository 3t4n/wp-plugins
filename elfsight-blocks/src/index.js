'use strict';

// import {
//   getApplications,
//   displayPanel,
//   displayCatalog,
//   displayCreateButton,
//   setQueryParams,
// } from '@elfsight/embed-sdk';

import { ElfsightEmbedSDK } from '@elfsight/embed-sdk/lib/embed-sdk.cjs'; // @TODO fix "main"/"module" in package

const {
  getApplications,
  displayPanel,
  displayCatalog,
  displayCreateButton,
  setQueryParams
} = ElfsightEmbedSDK;

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

setQueryParams({
  'utm_source': 'portals',
  'utm_medium': 'wordpress-org',
  'utm_campaign': 'elfsight-blocks-wordpress',
  'utm_content': 'iframe',
});

const glyphIcon = () => (
  <svg width="24" height="24" viewBox="0 0 200 200">
    <path fill="#F93262"
          d="M107.170879,4.05947549 C160.174757,5.91444563 201.791622,50.6358496 199.940567,103.755017 C198.090039,156.872074 153.460932,198.575919 100.457581,196.720949 C47.4521232,194.865979 5.83473162,150.144047 7.68578608,97.0269906 C7.77478414,94.4669735 7.90169855,91.9370369 8.19870984,89.4355978 C8.34984857,88.1632413 10.3320304,78.5173966 18.9822211,79.6678475 C25.4669678,80.5306857 27.5191894,86.2153908 27.0399691,90.5480522 C26.9478113,91.3808098 26.7598095,93.5835538 26.7598095,93.5835538 C26.6407943,94.9408748 26.5565358,96.3082226 26.5080871,97.6855973 C25.0193443,140.402156 58.48841,176.367468 101.114271,177.85936 C143.739078,179.351252 179.629523,145.812442 181.118266,103.096411 C182.607009,60.3782689 149.137943,24.4129573 106.513662,22.9210652 C102.029529,22.7642541 97.6194093,22.9978607 93.3170344,23.5872375 L92.3261067,23.7295472 C92.3261067,23.7295472 81.1755442,25.5797678 78.6914976,18.0337598 C76.2880232,10.7320907 81.9028006,6.50814162 85.7039133,5.71601924 C92.6373366,4.38561248 99.8230089,3.80194336 107.170879,4.05947549 Z M4.93017689,11.6424866 C5.82963664,11.6424866 6.67064203,11.8899919 7.39684519,12.315342 L7.39684519,12.315342 L7.39842504,12.3127034 L108.858854,64.4355174 C109.161131,64.5843372 109.458669,64.738962 109.754627,64.8956978 L109.754627,64.8956978 L110.13695,65.0920132 C110.13695,65.0920132 110.132737,65.0967628 110.13221,65.0972905 C119.20422,70.0437017 125.201848,78.5749812 125.201848,88.2767653 L125.201848,88.2767653 L125.195528,88.4841631 L125.201848,88.4767749 L125.201848,88.4767749 L125.201988,119.430794 C125.202934,126.995827 125.2084,130.640192 125.210095,131.480301 L125.210273,131.564855 L125.210273,131.564855 L125.216066,131.688344 C125.216066,134.442566 123.008493,136.673807 120.284309,136.673807 C119.44699,136.673807 118.659173,136.461132 117.968253,136.089083 L117.968253,136.089083 L117.9672,136.08961 L94.3964045,124.209358 L94.4274748,124.173472 C84.8699251,119.733154 78.392551,111.306365 78.3003933,101.617246 C78.29934,101.613024 78.2940739,101.613552 78.2940739,101.608275 C78.2940739,94.3493517 77.1460515,85.910425 65.5431261,75.8951694 C42.7085394,56.1897397 5.83437618,23.9950573 1.87369893,20.5363164 C1.77627501,20.4582124 1.68306402,20.3753588 1.59195949,20.2903943 C1.54825038,20.2518701 1.5187599,20.226539 1.5187599,20.226539 L1.5187599,20.226539 C0.585070127,19.3167329 0,18.0422655 0,16.6279497 C0,13.8737281 2.20757333,11.6424866 4.93017689,11.6424866 Z"/>
  </svg>
);

const makeUrlIcon = url => (
  <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink"
       style={{marginRight: 0}}>
    <image xlinkHref={formatUrl(url)} width="24" height="24"/>
  </svg>
);

const formatUrl = url => url.includes('https://') ? url : `${BASE_URL}${url}`;

const BASE_URL = 'https://apps.elfsight.com';
const EMBED_CATEGORY = 'embed';
const ELFSIGHT_CATEGORY = 'elfsight';

const SINGLE_PORTAL_MODE = false;
const SINGLE_PORTAL = {
  alias: 'embed',
  title: __('Elfsight Widget'),
  description: __('Embed the Elfsight Widget on your page'),
  category: EMBED_CATEGORY,
  icon: glyphIcon,
  keywords: [__('Elfsight'), __('Widget')]
};

const registerElfsightBlock = ({
  alias,
  title,
  description = '',
  icon = glyphIcon,
  keywords = [],
  category = EMBED_CATEGORY,
  selectedApp = null
}) => {
  registerBlockType(`elfsight/${alias}`, {
    title,
    description,
    category,
    icon,
    keywords,
    attributes: {
      widgetId: {
        type: 'string',
        default: null,
        required: true,
        source: 'attribute',
        selector: 'div',
        attribute: 'data-widget-id'
      }
    },

    edit: (props) => {
      const {
        className,
        attributes: {widgetId},
        setAttributes
      } = props;

      const widgetsCatalogRef = React.useRef(null);
      const widgetButtonRef = React.useRef(null);
      const widgetPanelRef = React.useRef(null);

      const onAdd = (widget) => {
        setAttributes({
          widgetId: widget.id
        })
      };

      const onRemove = () => {
        setAttributes({
          widgetId: null
        });
      };

      const onEdit = () => {};

      const showWidget = (() => !!widgetId)();
      const showCatalog = (() => !widgetId && !selectedApp)();

      React.useEffect(() => {
        if (widgetsCatalogRef.current) {
          displayCatalog(widgetsCatalogRef.current, onAdd, {
            height: 500,
            title: 'Select Widget',
            searchPlaceholder: 'Search',
            buttonText: 'Add'
          });
        }

        if (widgetPanelRef.current) {
          displayPanel(widgetPanelRef.current, {
            onEdit,
            onRemove
          }, {
            appAlias: selectedApp,
            widgetId
          });
        }

        if (widgetButtonRef.current) {
          displayCreateButton(widgetButtonRef.current, onAdd, {
            appAlias: selectedApp,
            size: 'medium',
            text: `Select ${title} Widget`
          });
        }
      });

      return (
        <div className={className}>
          {showWidget && (
            <div>
              <div
                ref={widgetPanelRef}
              />

              <div
                dangerouslySetInnerHTML={{__html: `<div class="elfsight-app-${widgetId}"></div>`}}
              />
            </div>
          )}

          {!showWidget && !showCatalog && (
            <div
              style={{display: 'flex', justifyContent: 'center', color: 'red'}}
              ref={widgetButtonRef}
            />
          )}

          {!showWidget && showCatalog && (
            <div
              ref={widgetsCatalogRef}
            />
          )}
        </div>
      )
    },

    save: (props) => {
      const {
        className,
        attributes: {widgetId}
      } = props;

      return widgetId ? (
        <div className={className}
             data-widget-id={widgetId}
             dangerouslySetInnerHTML={{__html: `<div class="elfsight-app-${widgetId}"></div>`}}/>
      ) : null
    },
  });
};

const formatApplication = (application) => {
  return {
    alias: application.alias,
    title: application.name,
    description: application.caption,
    category: ELFSIGHT_CATEGORY,
    icon: makeUrlIcon(application.icon),
    keywords: application.tags.split(', '),
    selectedApp: application.alias
  }
};

if (SINGLE_PORTAL_MODE) {
  registerElfsightBlock(SINGLE_PORTAL);
} else {
  getApplications().then(applications => applications
    .sort((a, b) => a.name.localeCompare(b.name))
    .map(application => formatApplication(application))
    .forEach(block => registerElfsightBlock(block))
  )
}
