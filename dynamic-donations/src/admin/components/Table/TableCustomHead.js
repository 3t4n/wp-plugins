import React, { useState, useEffect } from "react";
import {
  TableContainer,
  Table,
  TableHead,
  TableBody,
  TableRow,
  TableCell,
  Button,
} from "@material-ui/core";
import {
  KeyboardArrowUp as KeyboardArrowUpIcon,
  KeyboardArrowDown as KeyboardArrowDownIcon,
} from "@material-ui/icons";
import { makeStyles, withStyles } from "@material-ui/core";

const StyledTableCell = withStyles((theme) => ({
  head: {
    background: "#f6f8fb",
    fontWeight: "bold",
  },
}))(TableCell);

export default function TableCustomHead({
  align = "center",
  columns,
  tabledata,
  onChange = () => {},
}) {
  const [orderedColumn, setOrderedColumn] = useState([]);
  useEffect(async () => {
    const columnsArray = await columns.map((column, index) => {
      return { ...column, order: "asc" };
    });
    await setOrderedColumn(columnsArray);
  }, []);

  const handleOrder = async (column) => {
    let ordered;
    switch (column.typeof) {
      case "number":
        ordered = await [...tabledata].sort((a, b) => {
          if (column.order === "desc") {
            return a[column.attribute] - b[column.attribute];
          } else {
            return b[column.attribute] - a[column.attribute];
          }
        });
        break;
      case "string":
        ordered = await [...tabledata].sort((a, b) => {
            const textA = a[column.attribute].toUpperCase();
            const textB = b[column.attribute].toUpperCase();
            return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;

        });
        if (column.order === "desc") {
            ordered = ordered.reverse();
        }
        break;
      case "date":
        ordered = await [...tabledata].sort((a, b) => {
          if (column.order === "desc") {
            return (
              new Date(a[column.attribute]) - new Date(b[column.attribute])
            );
          } else {
            return (
              new Date(b[column.attribute]) - new Date(a[column.attribute])
            );
          }
        });
        break;
      default:
        ordered = [...tabledata];
        break;
    }
    setOrderedColumn(
      [...orderedColumn].map((col) => {
        if (col.attribute === column.attribute) {
          col.order = column.order === "asc" ? "desc" : "asc";
          return col;
        }
        return col;
      })
    );
    onChange(ordered);
  };

  return (
    <TableHead>
      <TableRow>
        {orderedColumn.map((column, index) => {
          return (
            <StyledTableCell
              onClick={() => handleOrder(column)}
              key={index}
              align={align}
            >
              <Button>
                {" "}
                {column.label}
                {column?.order === "asc" ? (
                  <KeyboardArrowUpIcon />
                ) : (
                  <KeyboardArrowDownIcon />
                )}
              </Button>
            </StyledTableCell>
          );
        })}
      </TableRow>
    </TableHead>
  );
}
