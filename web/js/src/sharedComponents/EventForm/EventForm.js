import React from 'react';
import {Field, reduxForm} from 'redux-form';
import {Button, ButtonToolbar} from 'react-bootstrap';
import FieldGroup from '../FieldGroup/FieldGroup';
import validate from './validate';

const EventForm = ({handleSubmit, onSubmit, pristine, submitting}) => (
  <form onSubmit={handleSubmit(onSubmit)}>
    <div>
      <Field name="group" component={FieldGroup} type="text" label="Group"/>
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
