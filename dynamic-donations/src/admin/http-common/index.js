import axios from 'axios';
import { SAVE_ERROR, SYSTEM_ERROR } from '../config/constants';
import { jsonToFormData } from '../utils'

export const WPRequest = (data = {}) => {
  const formData = data;

  return new Promise((resolve, reject) => {
    try {
      const data = jsonToFormData(formData);
      axios.post(dydo_wp_admin.ajax_url, data)
        .then((res) => {
          resolve(res.data);
        })
        .catch((e) => {
          // reject(e.message);
          reject(SAVE_ERROR);
        });
    } catch (e) {
      reject(SYSTEM_ERROR);
    }
  });
}
