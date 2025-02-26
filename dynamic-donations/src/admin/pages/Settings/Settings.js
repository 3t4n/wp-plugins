import React from 'react';
import { Redirect } from 'react-router-dom';

export default function Settings() {
  return (
    <Redirect to="/settings/general" />
  );
}
