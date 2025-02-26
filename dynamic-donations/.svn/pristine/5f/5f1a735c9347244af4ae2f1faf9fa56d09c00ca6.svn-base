import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";

// Actions
import { changeStatusLoader } from "../actions/global.actions";

// Components
import MainButton from "../components/Buttons/MainButton";
import { Content } from "../components/Styles";

// Main Component
export default function ScreenPaymentMethodUpdated() {
  const dispatch = useDispatch();
  const [yourDonationURL, setYourDonationURL] = useState("");
  const { global } = useSelector((state) => ({
    global: state.global,
  }));
  const handleSubmit = (e) => {
    e.preventDefault();
    dispatch(changeStatusLoader(true));
    location.href = yourDonationURL;
  };

  useEffect(() => {
    if (global.settings.donations_url_type === "page") {
      setYourDonationURL(
        `${location.origin}?p=${global.settings.donations_page}`
      );
    }

    if (global.settings.donations_url_type === "url") {
      setYourDonationURL(global.settings.donations_url);
    }
  }, []);

  return (
    <>
      <Content>
        <h6 className="dydo_thanks__paragraph">
          Payment method has been successfully updated!{" "}
        </h6>
      </Content>
      <MainButton
        title={dydo_texts.screens.thanks.done}
        onClick={handleSubmit}
      />
    </>
  );
}
