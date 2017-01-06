import React from 'react';
import {connect} from 'react-redux';
import {loadEventGroups} from '../../state/actions';
import {PageHeader} from 'react-bootstrap';
import EventForm from '../../sharedComponents/EventForm/EventForm';
import submitForm from './submitForm';


class AddEventContainer extends React.Component {
  componentWillMount() {
    if (!this.props.loading) {
      this.props.loadEventGroups();
    }
  }

  render() {
    const {loading, loaded, failure, errorMessage, eventGroups} = this.props;

    return (
      <div>
        <PageHeader>Add Event</PageHeader>
        {loading && <div>Loading...</div>}
        {failure && <div>Loading failure: {errorMessage}</div>}
        {loaded &&
          <div>
            <EventForm onSubmit={submitForm} eventGroups={eventGroups}/>
          </div>
        }
      </div>
    );
  }
}


const mapStateToProps = state => ({
  ...state.app.eventGroups,
});

const mapDispatchToProps = {
  loadEventGroups
};

export default connect(mapStateToProps, mapDispatchToProps)(AddEventContainer);
