import React, { useEffect, useState } from "react";
import { useSelector } from "react-redux";
import dayjs from "dayjs";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
import { Line } from "react-chartjs-2";
import { WPRequest } from "../../../http-common";
import {
  Box,
  FormControl,
  Grid,
  InputLabel,
  Select,
  ButtonGroup,
  Button,
  LinearProgress,
  Typography,
  CircularProgress,
} from "@material-ui/core";
import FormSection from "../../../components/FormSection";
import FormSubSection from "../../../components/FormSubSection";

const DashboardStripeDonationChart = () => {
  ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip
  );
  const intervalUnits = ["day", "week", "month", "year"];
  const { currencies } = useSelector((state) => state.global.plugin.options);
  const { selectedCurrencies } = useSelector(
    (state) => state.global.plugin.options
  );
  const { defaultCurrency } = useSelector(
    (state) => state.global.plugin.options
  );
  const [chartData, setChartData] = useState({});
  const [chartOptions, setChartOptions] = useState({});
  const [yearToDate, setYearToDate] = useState(0);
  const [yearToDateAvg, setYearToDateAvg] = useState(0);
  const [intervalUnit, setIntervalUnit] = useState("week");
  const [currency, setCurrency] = useState(defaultCurrency);
  const [isLoading, setIsLoading] = useState(false);

  const getYearToDate = async () => {
    const { data: donations } = await getDonationData(currency.iso, "year");
    const currentYear = new Date().getFullYear();
    const firstDayofYear = new Date("01/01/" + currentYear);
    const today = new Date();
    const currentAmountDays = Math.round(
      (today.getTime() - firstDayofYear.getTime()) / (1000 * 60 * 60 * 24)
    );
    const donation = donations.find(
      (donation) => currentYear == parseInt(donation.label)
    );
    if (donation?.total_per_interval && donation.total_per_interval > 0) {
      await setYearToDate(donation.total_per_interval);
      await setYearToDateAvg(
        Math.round(donation.total_per_interval / currentAmountDays)
      );
    }
  };

  const getDonationData = async (currency, intervalUnit) => {
    return await WPRequest({
      action: "dydo_get_donations_total_by_intervals",
      currency,
      intervalUnit,
      paymentGateway: "stripe",
    });
  };

  const chart = async () => {
    const { data: donations } = await getDonationData(
      currency.iso,
      intervalUnit
    );
    if (Array.isArray(donations) && donations?.length > 0) {
      const labels = donations.map((donation) => donation.label);
      const totalPerInterval = donations.map(
        (donation) => donation.total_per_interval
      );
      await setChartData({
        labels: labels,
        datasets: [
          {
            label: intervalUnit.charAt(0).toUpperCase() + intervalUnit.slice(1),
            data: totalPerInterval,
            fill: true,
            backgroundColor: "rgba(39, 98, 255, 0)",
            borderColor: "RGB(39,98,255)",
          },
        ],
      });
      await setChartOptions({
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: false,
        },
        scales: {
          x: {
            title: {
              color: "RGB(39,98,255)",
              display: true,
              text: intervalUnit.charAt(0).toUpperCase() + intervalUnit.slice(1),
            },
          },
          y: {
            title: {
              color: "RGB(39,98,255)",
              display: true,
              text: 'Total amount',
            },
          },
        },
      });
    } else {
      setChartData({});
      setChartOptions({});
    }
  };

  useEffect(async () => {
    setIsLoading(true);
    await getYearToDate();
    await chart();
    setIsLoading(false);
  }, [intervalUnit, currency]);

  return (
    <FormSection style={{ height: "90vh" }} title="Reports Summary">
      <FormSubSection style={{ height: "10vh" }}>
        <Grid mb={1} container spacing={3}>
          <Grid item md={5}>
            <Box
              textAlign="left"
              p={1}
              border={2}
              borderColor={"gray"}
              borderRadius={5}
            >
              {" "}
              {isLoading && <CircularProgress />}
              {!isLoading && (
                <Grid container spacing={1}>
                  <Grid item>
                    {" "}
                    <Typography variant="subtitle1">YTD Donations: </Typography>
                  </Grid>
                  <Grid item>
                    <Typography variant="h6">
                      {currency?.symbol}
                      <b>{yearToDate}</b>
                    </Typography>
                  </Grid>
                </Grid>
              )}
            </Box>
          </Grid>
          <Grid item md={5}>
            <Box
              textAlign="left"
              p={1}
              border={2}
              borderColor={"gray"}
              borderRadius={5}
            >
              {" "}
              {isLoading && <CircularProgress />}
              {!isLoading && (
                <Grid container spacing={1}>
                  <Grid item>
                    <Typography variant="subtitle1">
                      Avg Donations per Day:{" "}
                    </Typography>
                  </Grid>
                  <Grid item>
                    <Typography variant="h6">
                      {currency?.symbol}
                      <b>{yearToDateAvg}</b>
                    </Typography>
                  </Grid>
                </Grid>
              )}
            </Box>
          </Grid>{" "}
        </Grid>
      </FormSubSection>
      <FormSubSection style={{ height: "80vh" }}>
        <Grid container spacing={3} mb={2}>
          <Grid item sm={12} md={5}>
            <FormControl variant="outlined" fullWidth>
              <InputLabel htmlFor="outlined-age-native-simple">
                Currency
              </InputLabel>
              <Select
                label="Currency"
                value={currency.iso}
                onChange={(event) => {
                  setCurrency(
                    currencies.find(
                      (currencyData) => currencyData.iso === event.target.value
                    )
                  );
                }}
              >
                {selectedCurrencies.map((currency, index) => {
                  const iso = currency.trim();
                  const symbol = currencies.find(
                    (currency) => currency.iso.trim() === iso
                  )["symbol"];
                  return (
                    <option key={index} value={iso}>
                      {iso.toUpperCase()}- {symbol}
                    </option>
                  );
                })}
              </Select>
            </FormControl>
          </Grid>
          <Grid item sm={12} md={7}>
            <Grid container spacing={1} alignItems="flex-start" >
              <Grid item>
                <p>Filter by:</p>
              </Grid>
              <Grid item>
                <ButtonGroup>
                  {intervalUnits.map((unit, index) => {
                    return (
                      <Button
                        key={index}
                        onClick={async () => {
                          await setIntervalUnit(unit);
                        }}
                        variant={unit == intervalUnit ? "contained" : ""}
                        color="primary"
                      >
                        {unit.charAt(0).toUpperCase() + unit.slice(1)}
                      </Button>
                    );
                  })}
                </ButtonGroup>
              </Grid>
            </Grid>
          </Grid>
        </Grid>
        <Grid container spacing={3} mb={2} style={{ height: "65vh" }}>
          <Grid item sm={12}>
            <Box my={2}>{isLoading && <LinearProgress />}</Box>
            <Box mt={2} style={{ height: "60vh" }}>
              <div
                style={{
                  height: "100%",
                  position: "relative",
                  bottom: 0,
                  top: 0,
                  left: 0,
                  right: 0,
                }}
              >
                {JSON.stringify(chartData) !== "{}" && !isLoading && (
                  <Line data={chartData} options={chartOptions} />
                )}
                {JSON.stringify(chartData) === "{}" && !isLoading && (
                  <Typography variant="subtitle1">
                    No donations data for this currency.
                  </Typography>
                )}
              </div>
            </Box>
          </Grid>
        </Grid>
      </FormSubSection>
    </FormSection>
  );
};

export default DashboardStripeDonationChart;
