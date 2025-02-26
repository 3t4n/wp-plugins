import React, { useState, useEffect, useMemo, useContext } from "react";
import dayjs from "dayjs";
import TableCustomHead from "../../components/Table/TableCustomHead";
import ConfirmModal from '../../components/ConfirmModal'

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
  Grid,
  Typography,
  LinearProgress,
} from "@material-ui/core";

import { WPRequest } from "../../http-common";
import { Layout } from "../../layouts";


export default function ExpiredCards() {

  const [expiredCards, setExpiredCards] = useState([]);
  const [isLoading, setIsLoading] = useState(false);
  const [page, setPage] = useState(0);
  const [rowsPerPage, setRowsPerPage] = useState(10);
  const [open, setOpen] = useState(false);

  const handleChangePage = (event, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = (event) => {
    setRowsPerPage(parseInt(event.target.value, 10));
    setPage(0);
  };

  const onReorderedItems = (reorderedArray) => {
    setExpiredCards(reorderedArray);
    setPage(0);
  };

  const sendReminder = async () => {
    setIsLoading(true);
    let list_of_emails = [];
    expiredCards.map((expired, index) => {
      if (!list_of_emails.includes(expired.email)) {
        list_of_emails.push(expired.email);
      }
      
    });
    const res = await WPRequest({action: "dydo_send_reminders_expired" , emails: list_of_emails});    
    if (res) {
      setIsLoading(false);
      setOpen(false);
    }
    
  }

  const openConfirmModal = () => {
    setOpen(true);
  }

  const handleClose = () => {
    setOpen(false);
  }

  useEffect(async () => {
    setIsLoading(true);
    const res = await WPRequest({action: "dydo_get_list_of_users"});    
    setExpiredCards(res.data)
    setIsLoading(false);
  }, []);

  return (
    <>
      {open && (
        <ConfirmModal
          title={"Do you want to send reminders to these "+expiredCards.length+" users?"}
          message={""}
          onConfirm={sendReminder}
          onCancel={handleClose}
          disabled={isLoading}
        />
      )}
      <Layout title="Expired Cards">
        <Paper>
          <TableContainer>
            <Box m={2}>
              <Grid item xs={12} md={2} container justifyContent="flex-end">
                <Button
                  type="submit"
                  variant="contained"
                  color="primary"
                  size="large"
                  onClick={openConfirmModal}                  
                >
                  Send Reminder
                </Button>
              </Grid>          
            </Box>
            {isLoading && <LinearProgress />}
            <Table>
              <TableCustomHead
                onChange={onReorderedItems}
                align="left"
                columns={[
                  { label: "User", attribute: "email", typeof: "string" },
                  {
                    label: "Card",
                    attribute: "card",
                    typeof: "string",
                  },
                  { label: "Date", attribute: "exp_month", typeof: "date" },
                  { label: "Expiration ", attribute: "days", typeof: "number" },
                ]}
                tabledata={expiredCards}
              ></TableCustomHead>
              <TableBody>
                {expiredCards
                  // .slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage)
                  .map((user, index) => (
                    <TableRow key={index}>
                      {/* <TableCell /> */}
                      <TableCell>
                        <Typography variant="subtitle1">
                          {user.email}
                        </Typography>
                      </TableCell>
                      <TableCell align="left">
                        <Typography variant="subtitle1">
                          {user.card}
                        </Typography>
                      </TableCell>
                      <TableCell align="left">
                        <Typography variant="subtitle1">
                          { dayjs(user.exp_year+'-'+user.exp_month+'-01').format("MMM, YYYY") }
                        </Typography>
                      </TableCell>
                      <TableCell align="left">
                        {user.days < 0 && 
                          "Expired "+(user.days * -1)+" days ago"
                        }
                        {user.days >= 0 && 
                          "Expires in "+user.days+" days"
                        }
                        </TableCell>
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
            count={expiredCards.length}
            onPageChange={handleChangePage}
            onRowsPerPageChange={handleChangeRowsPerPage}
          />
        </Paper>
      </Layout>
    </>
  );
}
