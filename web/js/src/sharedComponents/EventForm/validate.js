export default values => {
  const errors = {}

  if (!values.eventGroupId && !values.group) {
    errors.group = 'Select group or enter group name';
  }

  if (!values.name) {
    errors.name = 'Required';
  }

  if (!values.price) {
    errors.price = 'Required';
  }

  return errors;
}
