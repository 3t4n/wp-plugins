import React from "react";
import { useSelector } from "react-redux";
import { Container, Grid, Box, Typography } from "@material-ui/core";
import Header from "../components/Header";
import SideNav from "../components/SideNav";
import ContentHeader from "../components/ContentHeader";
import Alert from "../components/Alert";
import Upgrade from "../components/Upgrade";

export function Layout({ title, children }) {
  const { plugin } = useSelector((state) => state.global);

  return (
    <div style={{ minHeight: "100%" }}>
      <Header style={{ minHeight: "5vh" }}></Header>
      <Box mt={3} mb={1} style={{ minHeight: "90vh" }}>
        <Container maxWidth={false}>
          <Upgrade />
          <Grid container spacing={1}>
            <Grid item xs={12} md={3} lg={2}>
              <SideNav />
            </Grid>
            <Grid item xs={12} md={9} lg={10}>
              <ContentHeader title={title} />
              <Alert />
              {children}
            </Grid>
          </Grid>
        </Container>
      </Box>
      <div
        style={{
          minHeight: "15vh",
          position: "relative",
          bottom:0,
          top:0,
          left:0,
          right:0
        }}
      >
        <Box
          fontStyle="italic"
          mt={2}
          mb={2}
          textAlign={"right"}
          width={"100%"}
          style={{
            position: "absolute",
            bottom: 0,
          }}
        >
          <Container maxWidth="lg">
            <Typography variant="subtitle2">
              Version: {plugin.version}
            </Typography>
            <Typography variant="body2">
              {`${plugin.name} is the ultimate solution for your online donations. `}{" "}
              <a href="mailto:support@pluginswithpurpose.com">
                Feel free to give us your feedback
              </a>
            </Typography>
          </Container>
        </Box>
      </div>
    </div>
  );
}
