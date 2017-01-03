import React from 'react';
import {connect} from 'react-redux';
import {PageHeader, Table} from 'react-bootstrap';
import {loadEvents} from '../../state/actions';

class EventsContainer extends React.Component {
  componentWillMount() {
    if (!this.props.eventsLoading && !this.props.eventsLoaded) {
      this.props.loadEvents();
    }
  }

  render() {
    const {eventsLoading, event} = this.props;

    if (eventsLoading) {
      return <PageHeader>Loading</PageHeader>
    }

    if (!event) {
      return <PageHeader bsClass="danger">Event not found</PageHeader>
    }

    return (
      <div>
        <PageHeader>Event {event.name} (group: {event.group})</PageHeader>
      </div>
    );
  }
}


const mapStateToProps = (state, props) => {
  console.log(props);
  // state.events.events
  return {
    eventsLoading: state.events.loading,
    eventsLoaded: state.events.loaded,

    event: state.events.events.find(event => event.id == props.params.id)
  }
}

const mapDispatchToProps = {
  loadEvents
};

export default connect(mapStateToProps, mapDispatchToProps)(EventsContainer);
