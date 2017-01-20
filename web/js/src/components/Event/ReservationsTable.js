import React from 'react';
import {PageHeader, Table} from 'react-bootstrap';
import ReservationRow from './ReservationRow';
import {getAdminPanelUrl} from '../../services/config';

export default ({event}) => (
  <div>
    {event.reservations.length ? <a className="btn btn-primary" href={`${getAdminPanelUrl()}csv/${event.id}`}>Export</a> : null}
    {
      event.reservations.length
      ? <Table striped={true} bordered={true} hover={true}>
          <thead>
          <tr>
            <th>Date</th>
            <th>Name/Birth date</th>
            <th>E-mail/phone</th>
            <th>Options</th>
            <th>Reference/comment</th>
          </tr>
          </thead>
          <tbody>
          {event.reservations.map((reservation, key) => (
            <ReservationRow reservation={reservation} key={key} />
          ))}
          </tbody>
        </Table>
      : <PageHeader>No reservations</PageHeader>
    }
  </div>
)
