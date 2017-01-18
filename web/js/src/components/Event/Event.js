import React from 'react';
import {connect} from 'react-redux';
import {PageHeader} from 'react-bootstrap';
import ReservationsTable from './ReservationsTable';

class EventsContainer extends React.Component {
  render() {
    const {event} = this.props;

    if (!event) {
      return <PageHeader bsClass="danger">Event not found</PageHeader>
    }

    return (
      <div>
        <PageHeader>Event "{event.name}" ID: {event.id}, group: {event.groupName}</PageHeader>
        <ReservationsTable event={event} />
      </div>
    );
  }
}

const mapStateToProps = (state, props) => ({
  event: state.app.events.events.find(event => parseInt(event.id, 10) === parseInt(props.params.id, 10))
});

export default connect(mapStateToProps)(EventsContainer);
