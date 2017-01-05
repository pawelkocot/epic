import React from 'react';
import {Link} from 'react-router';

export default ({event}) => (
  <tr>
    <td>{event.id}</td>
    <td>{event.name}</td>
    <td>{event.groupName} (id: {event.groupId})</td>
    <td>
      <Link className="btn btn-info btn-sm" role="button" to={`/event/${event.id}`}>
        Show
      </Link>
    </td>
  </tr>
)
