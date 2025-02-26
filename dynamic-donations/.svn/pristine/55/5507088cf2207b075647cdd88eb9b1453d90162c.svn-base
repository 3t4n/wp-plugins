import React from "react";
import { Route, Redirect } from "react-router-dom";
import { useSelector } from "react-redux";

const PrivateRoute = (props) => {
  const { global } = useSelector((state) => ({ global: state.global }));
  // const license = global?.plugin?.license;
  const licenseExpires = global?.plugin?.licenseExpires;
  // // if (license?.installable && license?.status === 'uncompleted') {
  //   return <Redirect to="/activate" />
  // } 
  if (!!!licenseExpires && props.path !== "/license-expires") {
    return <Redirect to="/license-expires" />;

  }

  return <Route {...props} />
};

export default PrivateRoute;
