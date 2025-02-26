import React, { useState, useEffect, useMemo, useContext } from "react";
import { ExportToCsv } from "export-to-csv";
import { MuiPickersUtilsProvider, DatePicker } from "@material-ui/pickers";
import DateFnsUtils from "@date-io/date-fns";
import dayjs from "dayjs";
import TableCustomHead from "../../components/Table/TableCustomHead";
import {
  TableContainer,
  Table,
  TableBody,
  TableRow,
  TableCell,
  TablePagination,
  Paper,
  Button,
  Box,
  InputBase,
  Grid,
  Typography,
  Chip,
  LinearProgress,
  InputLabel,
  FormControl,
  Select,
  MenuItem,
} from "@material-ui/core";

import { Search as SearchIcon } from "@material-ui/icons";
import { makeStyles, withStyles } from "@material-ui/core";
import { ReportsContext } from "../../utils";
import { WPRequest } from "../../http-common";
import { Layout } from "../../layouts";

const useStyles = makeStyles((theme) => ({
  search: {
    border: "1px solid",
    borderColor: "#cccedd",
    position: "relative",
    borderRadius: theme.shape.borderRadius,
    marginLeft: 0,
    width: "100%",
  },
  searchIcon: {
    padding: theme.spacing(0, 2),
    height: "100%",
    position: "absolute",
    pointerEvents: "none",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    color: theme.palette.primary.main,
  },
  inputRoot: {
    color: "inherit",
    width: "100%",
  },
  inputInput: {
    padding: theme.spacing(1, 1, 1, 0),
    paddingLeft: `calc(1em + ${theme.spacing(4)}px)`,
    width: "100%",
  },
  chipContainer: {
    display: "flex",
    justifyContent: "left",
    flexWrap: "wrap",
    "& > *": {
      margin: theme.spacing(0.5),
    },
  },
}));

export default function Donations() {
  const year_quarters = {
    1: { first: 1, last: 3 },
    2: { first: 4, last: 6 },
    3: { first: 7, last: 9 },
    4: { first: 10, last: 12 },
  };
  const options = {
    amount: [
      { value: "equals", label: "Equals" },
      { value: "more", label: "More than" },
      { value: "less", label: "Less than" },
    ],
    to_date: [
      { value: "one_day", label: "As of today" },
      { value: "this_month", label: "This month" },
      { value: "quarter_to_date", label: "Quarter to date" },
      { value: "year_to_date", label: "Year to date" },
      { value: "last_month", label: "Last Month" },
      { value: "last_quarter", label: "Last Quarter" },
      { value: "last_year", label: "Last Year" },
    ],
    type: [
      { value: "onetime", label: "One Time" },
      { value: "recurring", label: "Recurrent" },
    ],
  };
  const classes = useStyles();
  const [donations, setDonations] = useState([]);
  const [donationsFiltered, setDonationsFiltered] = useState(donations);
  const [isLoading, setIsLoading] = useState(false);
  const [page, setPage] = useState(0);
  const [rowsPerPage, setRowsPerPage] = useState(10);
  const [search, setSearch] = useState("");
  const [filtersSelected, setFiltersSelected] = useState([]);
  const [filter, setFilter] = useState("default");
  const [option, setOption] = useState("default");
  const [startDate, setStartDate] = useState(new Date());
  const [endDate, setEndDate] = useState(new Date());
  const [csvRecords, setCsvRecords] = useState(donations);

  const getQuarter = (date = new Date()) => {
    return Math.floor(date.getMonth() / 3 + 1);
  };

  useMemo(() => {
    let donationsFiltered = donations;
    for (let index in filtersSelected) {
      let filter = filtersSelected[index];
      if (
        (filter["search"] !== "" && (index === "name" || index === "amount")) ||
        index === "last_date" ||
        index === "to_date" ||
        index === "between_dates" ||
        index === "type"
      ) {
        switch (index) {
          case "name":
            donationsFiltered = donationsFiltered.filter(
              (donation) =>
                donation[index]
                  .toLowerCase()
                  .trim()
                  .indexOf(filter["search"].toLowerCase().trim()) !== -1
            );
            break;
          case "amount":
            donationsFiltered = donationsFiltered.filter((donation) => {
              if (filter["option"] === "equals") {
                return parseInt(donation[index]) === parseInt(filter["search"]);
              } else if (filter["option"] === "more") {
                return parseInt(donation[index]) > parseInt(filter["search"]);
              } else if (filter["option"] === "less") {
                return parseInt(donation[index]) < parseInt(filter["search"]);
              }
            });
            break;
          case "to_date":
            donationsFiltered = donationsFiltered.filter((donation) => {
              const d = new Date();
              const donationDate = new Date(donation.created_at);
              if (filter["option"] == "one_day") {
                return (
                  donationDate.getDate() == d.getDate() &&
                  donationDate.getMonth() == d.getMonth() &&
                  donationDate.getFullYear() == d.getFullYear()
                );
              }
              if (filter["option"] == "this_month") {
                return (
                  donationDate.getMonth() == d.getMonth() &&
                  donationDate.getFullYear() == d.getFullYear()
                );
              }
              if (filter["option"] == "year_to_date") {
                return donationDate.getFullYear() == d.getFullYear();
              }
              if (filter["option"] == "last_month") {
                return (
                  donationDate.getMonth() == d.getMonth() - 1 &&
                  donationDate.getFullYear() == d.getFullYear()
                );
              }
              if (filter["option"] == "last_year") {
                return donationDate.getFullYear() == d.getFullYear() - 1;
              }
              if (filter["option"] == "quarter_to_date") {
                const quarter = year_quarters[getQuarter(d)];
                return (
                  donationDate.getMonth() + 1 >= quarter.first &&
                  donationDate.getMonth() + 1 <= quarter.last &&
                  donationDate.getFullYear() == d.getFullYear()
                );
              }
              if (filter["option"] == "last_quarter") {
                let quarter;
                if (getQuarter(d) - 1 == 0) {
                  quarter = year_quarters[4];
                } else {
                  quarter = year_quarters[getQuarter(d) - 1];
                }
                return (
                  donationDate.getMonth() + 1 >= quarter.first &&
                  donationDate.getMonth() + 1 <= quarter.last &&
                  donationDate.getFullYear() == d.getFullYear()
                );
              }
            });
            break;
          case "between_dates":
            donationsFiltered = donationsFiltered.filter((donation) => {
              const created_at = new Date(donation.created_at);
              return (
                created_at >= new Date(filter["startDate"]) &&
                created_at <= new Date(filter["endDate"])
              );
            });
            break;
          case "type":
            donationsFiltered = donationsFiltered.filter((donation) => {
              return filter["option"] === donation.type;
            });
            break;
          default:
            break;
        }
      }
    }
    setDonationsFiltered(donationsFiltered);
    setCsvRecords(donationsFiltered);
  }, [filtersSelected]);

  const handleChangePage = (event, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = (event) => {
    setRowsPerPage(parseInt(event.target.value, 10));
    setPage(0);
  };

  const addFilter = async () => {
    let filters = [];
    Object.assign(filters, filtersSelected);
    filters[filter] = [];
    if (search != "") {
      filters[filter]["search"] = search;
      setSearch("");
    }
    if (
      filter === "amount" ||
      filter === "last_date" ||
      filter === "to_date" ||
      filter === "type"
    ) {
      filters[filter]["option"] = option;
      setOption("default");
    }
    if (filter === "between_dates") {
      filters[filter]["startDate"] = startDate;
      filters[filter]["endDate"] = endDate;
      setStartDate("");
      setEndDate("");
    }
    await setFilter("default");
    await setFiltersSelected(filters);
  };

  const onReorderedDonations = (reorderedArray) => {
    setDonationsFiltered(reorderedArray);
    setCsvRecords(reorderedArray);
    setPage(0);
  };

  useEffect(async () => {
    setIsLoading(true);
    const res = await WPRequest({
      action: "dydo_get_donations",
    });
    if (res.success) {
      console.log(res.data);
      setDonations(res.data);
      await setDonationsFiltered(res.data);
      setCsvRecords(res.data);
    }
    setIsLoading(false);
  }, []);

  return (
    <ReportsContext.Provider value={csvRecords}>
      <Layout title="Donations">
        <Paper>
          <TableContainer>
            <Box m={2}>
              <Grid
                container
                spacing={1}
                justifyContent="space-between"
                alignItems="center"
              >
                <Grid item xs={12} md={3}>
                  <FormControl variant="outlined" fullWidth>
                    {/* <InputLabel id="demo-simple-select-filled-label">
                      Filter By{" "}
                    </InputLabel> */}
                    <Select
                      value={filter}
                      labelId="demo-simple-select-filled-label"
                      disabled={isLoading}
                      onChange={(event) => {
                        setOption("default");
                        setPage(0);
                        setFilter(event.target.value);
                      }}
                    >
                      <MenuItem value={"default"}>Filter by</MenuItem>
                      <MenuItem
                        value={"name"}
                        disabled={filtersSelected["name"] != undefined}
                      >
                        Name
                      </MenuItem>
                      <MenuItem
                        value={"amount"}
                        disabled={filtersSelected["amount"] != undefined}
                      >
                        Amount
                      </MenuItem>
                      <MenuItem
                        value={"to_date"}
                        disabled={
                          filtersSelected["to_date"] != undefined ||
                          filtersSelected["between_dates"] != undefined
                        }
                      >
                        Date
                      </MenuItem>
                      <MenuItem
                        value={"type"}
                        disabled={filtersSelected["type"] != undefined}
                      >
                        Donation type
                      </MenuItem>
                      <MenuItem
                        value={"between_dates"}
                        disabled={
                          filtersSelected["between_dates"] != undefined ||
                          filtersSelected["to_date"] != undefined
                        }
                      >
                        Custom
                      </MenuItem>
                    </Select>
                  </FormControl>
                </Grid>
                <Grid item xs={12} md={6}>
                  {filter === "name" && (
                    <div className={classes.search}>
                      <div className={classes.searchIcon}>
                        <SearchIcon />
                      </div>
                      <InputBase
                        placeholder="Search by user name"
                        classes={{
                          root: classes.inputRoot,
                          input: classes.inputInput,
                        }}
                        inputProps={{ "aria-label": "search by user name" }}
                        onKeyUp={(e) => {
                          setSearch(e.target.value.toLowerCase().trim());
                        }}
                      />
                    </div>
                  )}
                  {filter === "between_dates" && (
                    <MuiPickersUtilsProvider utils={DateFnsUtils}>
                      <>
                        <DatePicker
                          disableFuture
                          value={startDate}
                          format="MM/dd/yyyy"
                          label="From date"
                          views={["year", "month", "date"]}
                          onChange={(e) => {
                            setStartDate(e);
                          }}
                          animateYearScrolling
                        />
                        <DatePicker
                          disableFuture
                          value={endDate}
                          format="MM/dd/yyyy"
                          label="To date"
                          views={["year", "month", "date"]}
                          onChange={(e) => {
                            setEndDate(e);
                          }}
                          animateYearScrolling
                        />{" "}
                      </>
                    </MuiPickersUtilsProvider>
                  )}
                  {(filter === "amount" ||
                    filter === "last_date" ||
                    filter === "to_date" ||
                    filter === "type") && (
                    <Grid container p={0} spacing={3} alignItems="center">
                      <Grid
                        item
                        xs={12}
                        md={filter === "to_date" || filter === "type" ? 12 : 6}
                        p={0}
                      >
                        <FormControl variant="outlined" fullWidth>
                          {/* <InputLabel id="operator-select">Option</InputLabel> */}
                          <Select
                            value={option}
                            labelId="operator-select"
                            disabled={isLoading}
                            onChange={async (event) => {
                              setPage(0);
                              await setOption(event.target.value.trim());
                            }}
                          >
                            <MenuItem value={"default"} disabled={true}>
                              Options
                            </MenuItem>
                            {options[filter].map((option) => {
                              return (
                                <MenuItem
                                  key={option.value}
                                  value={option.value}
                                >
                                  {option.label}
                                </MenuItem>
                              );
                            })}
                          </Select>
                        </FormControl>
                      </Grid>
                      {filter === "amount" && (
                        <Grid item xs={12} md={6}>
                          {filter === "amount" && (
                            <div className={classes.search}>
                              <div className={classes.searchIcon}>
                                <SearchIcon />
                              </div>
                              <InputBase
                                placeholder="Amount"
                                classes={{
                                  root: classes.inputRoot,
                                  input: classes.inputInput,
                                }}
                                inputProps={{
                                  "aria-label": "search by amount",
                                }}
                                onKeyUp={(e) => {
                                  setSearch(
                                    e.target.value.toLowerCase().trim()
                                  );
                                }}
                              />
                            </div>
                          )}
                        </Grid>
                      )}
                    </Grid>
                  )}
                </Grid>
                <Grid item xs={12} md={2} container justifyContent="flex-start">
                  <Button
                    type="submit"
                    variant="contained"
                    color="primary"
                    onClick={addFilter}
                    size="large"
                    disabled={
                      isLoading ||
                      filter === "default" ||
                      (filter == "name" && search === "") ||
                      (filter == "amount" &&
                        (search === "" || option === "")) ||
                      (filter == "to_date" && option === "") ||
                      (filter == "between_dates" &&
                        (startDate === "" || endDate === ""))
                        ? true
                        : false
                    }
                  >
                    Add filter{" "}
                  </Button>
                </Grid>
                <Grid item xs={12}>
                  <div direction="row" className={classes.chipContainer}>
                    {Object.entries(filtersSelected).map((entry) => {
                      const filter = entry[0];
                      const option =
                        entry[1]["option"] != undefined
                          ? entry[1]["option"]
                          : "";
                      const search =
                        entry[1]["search"] != undefined
                          ? entry[1]["search"]
                          : "";
                      const startDate =
                        filter === "between_dates" ? entry[1]["startDate"] : "";
                      const endDate =
                        filter === "between_dates" ? entry[1]["endDate"] : "";
                      const label =
                        filter != "" && option != "" && search != ""
                          ? filter +
                            ":  when value " +
                            option +
                            " '" +
                            search +
                            "' "
                          : filter != "" && option != ""
                          ? filter + ": " + option
                          : filter != "" && search != ""
                          ? filter + ": when value is '" + search + "'"
                          : filter != "" && startDate != "" && endDate != ""
                          ? "From " +
                            dayjs(startDate, "YYYY-MM-DD HH:mm:ss").format(
                              "MMM, DD YYYY"
                            ) +
                            " to " +
                            dayjs(endDate, "YYYY-MM-DD HH:mm:ss").format(
                              "MMM, DD YYYY"
                            )
                          : "";

                      return (
                        <Chip
                          key={entry[0]}
                          label={label}
                          color="primary"
                          onDelete={() => {
                            const arrayRemovedFilter = [];
                            Object.assign(arrayRemovedFilter, filtersSelected);
                            delete arrayRemovedFilter[filter];
                            setFiltersSelected(arrayRemovedFilter);
                          }}
                        />
                      );
                    })}
                  </div>
                </Grid>
              </Grid>
            </Box>
            {isLoading && <LinearProgress />}
            <Table>
              <TableCustomHead
                onChange={onReorderedDonations}
                align="left"
                columns={[
                  { label: "User", attribute: "name", typeof: "string" },
                  {
                    label: "Transaction ID",
                    attribute: "transaction_id",
                    typeof: "string",
                  },
                  { label: "Type", attribute: "type", typeof: "string" },
                  { label: "Amount", attribute: "amount", typeof: "number" },
                  { label: "Date", attribute: "created_at", typeof: "date" },
                ]}
                tabledata={donationsFiltered}
              ></TableCustomHead>
              <TableBody>
                {donationsFiltered
                  .slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage)
                  .map((donation, index) => (
                    <TableRow key={index}>
                      {/* <TableCell /> */}
                      <TableCell>
                        <Typography variant="subtitle1">
                          {donation.name}
                        </Typography>
                        <Typography variant="body2">
                          W-ID: {donation.user_id}
                        </Typography>
                      </TableCell>
                      <TableCell align="left">
                        <Typography variant="subtitle1">
                          {donation.transaction_id}
                        </Typography>
                        <Chip
                          variant="outlined"
                          color={donation.amount > 0 ? "primary" : "secondary"}
                          size="small"
                          label={donation.amount > 0 ? "Completed" : 'Refund'}
                        />
                      </TableCell>
                      <TableCell align="left">
                        <Typography variant="subtitle1">
                          {donation.type === "onetime" && "One Time"}
                          {donation.type === "recurring" && "Recurring"}
                        </Typography>
                        <div direction="column" className={classes.chipContainer}>
                          <Chip
                            variant="outlined"
                            color="primary"
                            size="small"
                            label={donation.payment_gateway}
                          />

                          {donation.active == 1 && (
                            <Chip
                              variant="outlined"
                              color="primary"
                              size="small"
                              label="Active subscription"
                            />
                          )}
                        </div>
                      </TableCell>
                      <TableCell align="left">
                        <Typography variant="subtitle1">
                          $ {donation.amount}
                        </Typography>
                        <Typography variant="body2">USD</Typography>
                      </TableCell>
                      <TableCell align="left">
                        {dayjs(
                          donation.created_at,
                          "YYYY-MM-DD HH:mm:ss"
                        ).format("MMM, DD YYYY")}
                      </TableCell>
                      {/*<TableCell align="left">Actions</TableCell>*/}
                    </TableRow>
                  ))}
              </TableBody>
            </Table>
          </TableContainer>
          <TablePagination
            component="div"
            rowsPerPageOptions={[10, 25, 50]}
            rowsPerPage={rowsPerPage}
            page={page}
            count={donationsFiltered.length}
            onPageChange={handleChangePage}
            onRowsPerPageChange={handleChangeRowsPerPage}
          />
        </Paper>
      </Layout>
    </ReportsContext.Provider>
  );
}
