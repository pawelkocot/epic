import React from 'react';
import {PageHeader} from 'react-bootstrap';
import EventForm from '../../sharedComponents/EventForm/EventForm';
import submitForm from './submitForm';

export default (props, context) => (
  <div>
    <PageHeader>Add Event</PageHeader>

    <EventForm onSubmit={submitForm}/>
  </div>
);
