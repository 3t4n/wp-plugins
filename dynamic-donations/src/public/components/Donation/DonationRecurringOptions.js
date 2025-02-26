import React, { useEffect, useRef, useState } from "react";
import { useSelector, useDispatch } from "react-redux";
// Actions
import { DONATIONS_MODES } from "../../share/constants";
import { changeError } from "../../actions/global.actions";
import { changeRecurringDonationOptions } from "../../actions/donate.actions";
import { getFormattedDateRecurringDonation } from "../../utils/date";
import { capitalize } from "../../utils/string";

import flatpickr from "flatpickr";
import dayjs from "dayjs";

// Main Components
export default function DonationRecurringOptions() {
  const INTERVALS = ["day", "week", "month"];
  // Redux Hooks
  const dispatch = useDispatch();
  const { donate } = useSelector((state) => ({
    donate: state.donate,
  }));
  const dateElement = useRef(null);
  console.log(donate);
  const [startingDateOption, setStartingDateOption] = useState(
    donate.recurringOptions.startDate == "now" ? "now" : "future"
  );
  const [startDate, setStartDate] = useState(
    donate.recurringOptions.startDate == "now"
      ? "now"
      : donate.recurringOptions.startDate
  );

  const handleChangeRecurringDonationOptions = async (e) => {
    let name = e.target.name;
    let value = e.target.value;
    name === "intervalCount" && value < 1 ? (value = 1) : null;
    await dispatch(
      changeRecurringDonationOptions({
        ...donate.recurringOptions,
        [name]: value,
      })
    );
  };

  const handleChangeStartingDateOptions = async (e) => {
    setStartingDateOption(e.target.value);
  };

  const handleStartDate = (dateStr) => {
    if (dateStr != "") {
      handleChangeRecurringDonationOptions({
        target: { name: "startDate", value: dateStr },
      });
      setStartDate(dateStr);
      return;
    }
    dispatch(changeError("Date cannot be empty."));
  };

  useEffect(() => {
    handleChangeRecurringDonationOptions({
      target: {
        name: "timezone",
        value: Intl.DateTimeFormat().resolvedOptions().timeZone,
      },
    });
    if (startingDateOption == "future") {
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);
      flatpickr(dateElement.current, {
        enableTime: true,
        dateFormat: "m/d/Y G:i K",
        altInput: true,
        altFormat: "m/d/Y G:i K",
        defaultDate: startDate != "now" ? startDate : tomorrow,
        minDate: tomorrow.setHours(0, 0, 0, 0),
        onReady: (selectedDates, dateStr, instance) => handleStartDate(dateStr),
        onChange: (selectedDates, dateStr, instance) =>
          handleStartDate(dateStr),
      });
    } else {
      handleStartDate(startingDateOption);
    }
  }, [startingDateOption]);

  return (
    <div className="dydo_row">
      <div className="dydo_col-xs-12 dydo_col-sm-12">
        <p
          className="dydo_donation-type__placeholder"
          style={{ marginTop: "16px" }}
        >
          The recurring donations are charged based on the time recurrence you
          choose.
        </p>
      </div>
      <div className="dydo_col-xs-12 dydo_col-sm-6">
        <div className="dydo_startDate_options">
          <label htmlFor="dydo_startDate_options">
            <h6>Starting date options:</h6>
          </label>
          <select
            name="date"
            id="dydo_startDate_options"
            value={startingDateOption}
            onChange={handleChangeStartingDateOptions}
          >
            <option key="now" value="now">
              Now
            </option>
            <option key="future" value="future">
              Any date in the future
            </option>
          </select>
        </div>
      </div>
      <div className="dydo_col-xs-12 dydo_col-sm-6">
        {startingDateOption == "future" && (
          <div className="dydo_start_date">
            <label htmlFor="dydo_start_date">
              <h6>Starting date</h6>
            </label>
            <input
            id="dydo_start_date"
              type="text"
              placeholder="Select start date"
              disabled={global.loader}
              ref={dateElement}
            />
          </div>
        )}
      </div>

      <div className="dydo_col-xs-12 dydo_col-sm-6">
        <div className="dydo_interval">
          <label htmlFor="dydo-modes">
            <h6>{dydo_texts.screens.donate.make_this_donation_every}:</h6>
          </label>
          <select
            name="mode"
            id="dydo-modes"
            value={donate.recurringOptions.mode}
            onChange={handleChangeRecurringDonationOptions}
          >
            {DONATIONS_MODES.map((mode) => (
              <option key={mode.key} value={mode.key}>
                {mode.label}
              </option>
            ))}
          </select>
        </div>
      </div>
      <div
        className="dydo_col-xs-12 dydo_col-sm-6"
        style={{
          display: "flex",
          flexDirection: "column",
          justifyContent: "flex-end",
        }}
      >
        {donate.recurringOptions.mode === "custom" ? (
          <>
            <div className="dydo_row">
              <div className="dydo_col-xs-12 dydo_col-sm-6">
                <div className="dydo_interval">
                  <label htmlFor="dydo-interval-count">
                    <h6>{dydo_texts.screens.donate.interval_count}:</h6>
                  </label>
                  <input
                    type="number"
                    name="intervalCount"
                    id="dydo-interval-count"
                    value={donate.recurringOptions.intervalCount}
                    onChange={handleChangeRecurringDonationOptions}
                  />
                </div>
              </div>
              <div className="dydo_col-xs-12 dydo_col-sm-6">
                <div className="dydo_interval">
                  <label htmlFor="dydo-interval">
                    <h6>{dydo_texts.screens.donate.interval}:</h6>
                  </label>
                  <select
                    name="interval"
                    id="dydo-interval"
                    value={donate.recurringOptions.interval}
                    onChange={handleChangeRecurringDonationOptions}
                  >
                    {INTERVALS.map((interval, key) => (
                      <option key={key} value={interval}>
                        {capitalize(interval) + "s"}
                      </option>
                    ))}
                  </select>
                </div>
              </div>
            </div>
            <h6 style={{ fontSize: 12, textAlign: "right", marginBottom: 6 }}>
              {`** Custom donation every ${donate.recurringOptions.intervalCount} ${donate.recurringOptions.interval}s **`}
            </h6>
          </>
        ) : null}
        {donate.type === "recurring" && (
          <h6
            style={{
              fontSize: 13,
              textAlign: "right",
              marginBottom: donate.recurringOptions.mode === "custom" ? 0 : 20,
            }}
          >
            Your first donation will be made{" "}
            {startingDateOption == "now"
              ? "today"
              : `on ${dayjs(startDate).format("dddd, MMMM D, YYYY")}`}
            ! Your next donation will be made{" "}
            {getFormattedDateRecurringDonation(
              donate.recurringOptions.mode,
              donate.recurringOptions.interval,
              donate.recurringOptions.intervalCount,
              startDate
            )}
          </h6>
        )}
      </div>
    </div>
  );
}
