import React from 'react';
import {Field, reduxForm} from 'redux-form';
import {Button, ButtonToolbar, Label} from 'react-bootstrap';
import FieldGroup from '../FieldGroup/FieldGroup';
import validate from './validate';

const EventForm = ({eventGroups, handleSubmit, onSubmit, pristine, submitting, error}) => (
  <form onSubmit={handleSubmit(onSubmit)}>
    {error && <Label bsStyle="danger">{error}</Label>}
    <div>
      Select event group:&nbsp;
      <Field name="eventGroupId" component="select" label="">
        <option></option>
        {eventGroups.map(eventGroup => <option value={eventGroup.id} key={eventGroup.id}>{eventGroup.name}</option>)}
      </Field>

      <Field name="group" component={FieldGroup} type="text" label="Or create new group" placeholder="New group"/>
    </div>
    <div>
      <Field name="name" component={FieldGroup} type="text" label="Name"/>
    </div>
    <ButtonToolbar>
      <Button type="submit"
              bsStyle="primary"
              disabled={pristine || submitting}>{submitting ? 'Submitting' : 'Submit'}</Button>
    </ButtonToolbar>
  </form>
);

export default reduxForm({
  form: 'EventForm',
  validate
})(EventForm);
