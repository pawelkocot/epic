import React from 'react';
import {PageHeader, Table} from 'react-bootstrap';
import EventRow from './EventRow';

export default ({events}) => (
  <div>
    <PageHeader>Events</PageHeader>
    {
      events.length
      ? <Table striped={true} bordered={true} hover={true}>
          <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Group</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          {events.map((event, key) => (
            <EventRow event={event} key={key} />
          ))}
          </tbody>
        </Table>
      : <PageHeader>No events</PageHeader>
    }
  </div>
)
