import React from 'react';
import {FormGroup, ControlLabel, FormControl, Label} from 'react-bootstrap';

export default  ({children, label, input, meta: {touched, error}, ...props}) => (
  <FormGroup controlId={props.name} { ...touched && error ? {validationState: 'error'} : {}}>
    <ControlLabel>{label} {touched && error && <Label bsStyle="danger">{error}</Label>}</ControlLabel>
    <FormControl {...input} {...props}>{children}</FormControl>
  </FormGroup>
);
