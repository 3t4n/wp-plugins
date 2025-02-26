import {createContext } from "react";

export const jsonToFormData = (formItems) => {
  const formData = new FormData();
  const items = Object.keys(formItems);

  if (items.length) {
    items.forEach((item) => {
      formData.append(item, formItems[item]);
    });
  }

  return formData;
}

export const ReportsContext = createContext();
