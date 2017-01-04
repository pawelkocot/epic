import React from 'react';
import {connect} from 'react-redux';
import {loadEvents} from '../../state/actions';
import EventsTable from './EventsTable';
import sortBy from 'lodash/sortBy';

class EventsContainer extends React.Component {
  componentWillMount() {
    if (!this.props.loading && !this.props.loaded) {
      this.props.loadEvents();
    }
  }

  render() {
    const {loading, loaded, failure, errorMessage, events} = this.props;

    return (
      <div>
        {loading && <div>Loading...</div>}
        {failure && <div>Loading failure: {errorMessage}</div>}
        {loaded && <EventsTable events={events}/>}
      </div>
    );
  }
}


const mapStateToProps = state => ({
  ...state.events,
  events: sortBy(state.events.events, event => event.id).reverse()
});

const mapDispatchToProps = {
  loadEvents
};

export default connect(mapStateToProps, mapDispatchToProps)(EventsContainer);
