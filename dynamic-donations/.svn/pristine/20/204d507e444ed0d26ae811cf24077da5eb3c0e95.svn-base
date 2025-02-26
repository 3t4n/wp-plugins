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

const DashboardWoocommerceDonationChart = () => {
  ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
  );
  const intervalUnits = ["day", "week", "month", "year"];
  const [chartData, setChartData] = useState({});
  const [chartOptions, setChartOptions] = useState({});
  const [yearToDateCurrency, setYearToDateCurrency] = useState();
  const [yearToDate, setYearToDate] = useState(0);
  const [yearToDateAvg, setYearToDateAvg] = useState(0);
  const [intervalUnit, setIntervalUnit] = useState("week");
  const [currencies, setCurrencies] = useState([]);
  const [isLoading, setIsLoading] = useState(false);
  const [isLoadingAvg, setIsLoadingAvg] = useState(false);

  const getYearToDate = async () => {
    const { data: donations } = await getDonationData(
      yearToDateCurrency,
      "year"
    );
    const currentYear = new Date().getFullYear();
    const firstDayofYear = new Date("01/01/" + currentYear);
    const today = new Date();
    const currentAmountDays = Math.round(
      (today.getTime() - firstDayofYear.getTime()) / (1000 * 60 * 60 * 24)
    );
    let donation = donations.find(
      (donation) => currentYear == parseInt(donation.label)
    );
    if (donation?.total_per_interval && donation.total_per_interval > 0) {
      await setYearToDate(donation.total_per_interval);
      await setYearToDateAvg(
        Math.round(donation.total_per_interval / currentAmountDays)
      );
    }
  };

  const randomColor = function () {
    return (
      "rgba(" +
      Math.round(Math.random() * 255) +
      "," +
      Math.round(Math.random() * 255) +
      "," +
      Math.round(Math.random() * 255) +
      ",1)"
    );
  };

  const getDonationData = async (currency, intervalUnit) => {
    return await WPRequest({
      action: "dydo_get_donations_total_by_intervals",
      currency,
      intervalUnit,
      paymentGateway: "woocommerce",
    });
  };

  const getDonationsCurrencies = async () => {
    return await WPRequest({
      action: "dydo_get_previous_donations_currency",
      paymentGateway: "woocommerce",
    });
  };

  const chart = async () => {
    let datasets = [];
    datasets.push(
      ...(await Promise.all(
        currencies.map(async ({ currency }) => {
          let data = [];
          const { data: donations } = await getDonationData(
            currency.toUpperCase().trim(),
            intervalUnit
          );
          for (let i = 0; i < donations.length; i++) {
            data.push({
              x: donations[i].label,
              y: donations[i].total_per_interval,
            });
          }
          return {
            label: currency,
            data: [...data],
            fill: true,
            backgroundColor: "rgba(39, 98, 255, 0)",
            borderColor: randomColor(),
          };
        })
      ))
    );
    if (datasets?.length > 0) {
      await setChartData({
        datasets: [...datasets],
      });
      await setChartOptions({
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
          legend: true,
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
    const { data: currency } = await getDonationsCurrencies();
    if (currency.length>0) {
      setCurrencies(currency);
      setYearToDateCurrency(currency[0].currency);
    }
    setIsLoading(false);
  }, []);

  useEffect(async () => {
    if (currencies.length > 0) {
      setIsLoading(true);
      await chart();
      setIsLoading(false);
    }
  }, [intervalUnit, currencies]);

  useEffect(async () => {
    if (yearToDateCurrency) {
      setIsLoadingAvg(true);
      await getYearToDate();
      setIsLoadingAvg(false);
    }
  }, [yearToDateCurrency]);

  return (
    <FormSection style={{ height: "90vh" }} title="Reports Summary">
      <FormSubSection style={{ height: "10vh" }}>
        <Grid mb={2} container spacing={3}>
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
                      <b>{yearToDate}</b>
                      {yearToDateCurrency}
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
                      <b>{yearToDateAvg}</b>
                      {yearToDateCurrency}
                    </Typography>
                  </Grid>
                </Grid>
              )}
            </Box>
          </Grid>{" "}
        </Grid>
      </FormSubSection>
      <FormSubSection style={{ minHeight: "80vh" }}>
        <Grid container spacing={3} mb={2} style={{ minHeight: "10vh" }}>
          <Grid item sm={12}>
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
        <Grid container spacing={3} mb={2} style={{ minHeight: "60vh" }}>
          <Grid item sm={12}>
            <Box my={2}>{isLoading && <LinearProgress />}</Box>
            <Box mt={2} style={{ height: "60vh" }}>
              <div style={{ height: "100%", position: "relative" }}>
                {JSON.stringify(chartData) !== "{}" && !isLoading && (
                  <Line data={chartData} options={chartOptions} />
                )}
                {JSON.stringify(chartData) === "{}" && !isLoading && (
                  <Typography variant="subtitle1">
                    No donations data for this payment gateway.
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

export default DashboardWoocommerceDonationChart;
