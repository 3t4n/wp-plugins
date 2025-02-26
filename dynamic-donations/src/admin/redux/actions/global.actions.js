import * as types from '../types/global.types';

export const changeAlert = (alert) => ({
  type: types.CHANGE_ALERT,
  payload: alert,
});

export const updatePluginData = (options) => ({
  type: types.UPDATE_PLUGIN_DATA,
  payload: options,
});

export const updateLicense = (license) => ({
  type: types.UPDATE_LICENSE,
  payload: license,
});
