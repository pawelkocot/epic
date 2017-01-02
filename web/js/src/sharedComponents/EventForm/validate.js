export default values => {
  const errors = {}
  if (!values.group) {
    errors.group = 'Required';
  }
  if (!values.name) {
    errors.name = 'Required';
  }

  return errors;
}
