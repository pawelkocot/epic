import React from 'react';
import {PageHeader, Table} from 'react-bootstrap';
import ReservationRow from './ReservationRow';

export default ({reservations}) => (
  <div>
    {
      reservations.length
      ? <Table striped={true} bordered={true} hover={true}>
          <thead>
          <tr>
            <th>ID</th>
          </tr>
          </thead>
          <tbody>
          {reservations.map((reservation, key) => (
            <ReservationRow reservation={reservation} key={key} />
          ))}
          </tbody>
        </Table>
      : <PageHeader>No reservations</PageHeader>
    }
  </div>
)
