import React, { useEffect, useState, useContext } from "react";
import {
  Box, Grid,
  Typography,
  Breadcrumbs,
  Link as BreadcrumbLink,
  Button,
} from "@material-ui/core";
import { Link, useLocation } from "react-router-dom";
import { ReportsContext } from "../utils";
import { ExportToCsv } from "export-to-csv";

export default function ContentHeader({ title }) {
  const location = useLocation();
  let csvRecords = [];
  if (title != undefined && title?.toLowerCase()?.trim() === "donations") {
    csvRecords = useContext(ReportsContext);
  }
  const [showBreadcrumbs, setShowBreadcrumbs] = useState(false);
  const [breadcrumbs, setBreadcrumbs] = useState([]);

  useEffect(() => {
    const paths = location.pathname.split("/").filter((path) => path !== "");

    location.pathname === "/"
      ? setShowBreadcrumbs(false)
      : setShowBreadcrumbs(true);
    setBreadcrumbs(paths);
  }, [location]);

  const generateFilteredDonationsCsv = async () => {
    console.log(csvRecords);
    const csvExporter = new ExportToCsv({
      fieldSeparator: ",",
      filename: "donations_" + new Date().getTime(),
      quoteStrings: '"',
      decimalSeparator: ".",
      showLabels: true,
      useTextFile: false,
      useBom: true,
      useKeysAsHeaders: true,
    });
    csvExporter.generateCsv(csvRecords);
  };

  return (
    <Box>
      <Grid container justifyContent="space-between" spacing={3}>
        <Grid item>
          {title != "" && title != undefined && (
            <Typography variant={"h5"}>
              <Box fontWeight={"fontWeightNormal"} mb={2}>
                {title}
              </Box>
            </Typography>
          )}
        </Grid>
        <Grid item>
          {title != undefined && title?.toLowerCase()?.trim() === "donations" && (
            <Button
              type="submit"
              variant="contained"
              color="primary"
              onClick={generateFilteredDonationsCsv}
              disabled={csvRecords.length === 0 ? true : false}
            >
              Download results in CSV{" "}
            </Button>
          )}
        </Grid>
      </Grid>

      {showBreadcrumbs && (
        <>
          <Box mb={2}>
            <Breadcrumbs>
              {/*<BreadcrumbLink component={Link} to={'/'}>
                  <Typography variant={'body2'}>/</Typography>
                </BreadcrumbLink>*/}
              {/*{*/}
              {/*  breadcrumbs.map((breadcrumb, key) => {*/}
              {/*    breadcrumb += '/' + breadcrumb;*/}
              {/*    return (*/}
              {/*      <BreadcrumbLink component={Link} to={breadcrumb} key={key}>*/}
              {/*        <Typography variant={'body2'}>{breadcrumb}</Typography>*/}
              {/*      </BreadcrumbLink>*/}
              {/*    )*/}
              {/*  })*/}
              {/*}*/}
            </Breadcrumbs>
          </Box>
          {title != undefined && <hr />}
        </>
      )}
    </Box>
  );
}
