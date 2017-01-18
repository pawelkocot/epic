import React from 'react';
import {connect} from 'react-redux';
import {loadEventGroups} from '../../state/actions';
import {PageHeader} from 'react-bootstrap';
import EventForm from '../../sharedComponents/EventForm/EventForm';
import submitForm from './submitForm';


class AddEventContainer extends React.Component {
  componentWillMount() {
    if (!this.props.eventGroups.loading && !this.props.eventGroups.loaded) {
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
  eventGroupsState: {
    loading: state.app.eventGroups.loading,
    loaded: state.app.eventGroups.loaded,
  },
  eventGroups: state.app.eventGroups.eventGroups,
  loading: state.app.eventGroups.loading,
  loaded: state.app.eventGroups.loaded,
  failure: state.app.eventGroups.failure,
  errorMessage: state.app.eventGroups.errorMessage
});

const mapDispatchToProps = {
  loadEventGroups
};

export default connect(mapStateToProps, mapDispatchToProps)(AddEventContainer);
