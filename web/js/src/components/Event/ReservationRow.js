import React from 'react';

export default ({reservation}) => (
  <tr>
    <td>{reservation.createdAt}</td>
    <td>
      {reservation.firstName} {reservation.lastName}<br />
      {reservation.birthDate}
    </td>
    <td>
      {reservation.email}<br />
      {reservation.phone}
    </td>
    <td>
      {reservation.insureResign && <div>Insure resign: {reservation.insureResign ? 'yes' : 'no'}</div>}
      {reservation.insureExtra && <div>Insure extra: {reservation.insureExtra ? 'yes' : 'no'}</div>}
      {reservation.transport && <div>Transport: {reservation.transport ? 'yes' : 'no'}</div>}
    </td>
    <td>
      {reservation.reference ? reservation.reference : '-'}<br />
      {reservation.comment}
    </td>
  </tr>
)

/**
 'insureResign' => $entity->getInsureResign(),
 'insureExtra' => $entity->getInsureExtra(),
 'transport' => $entity->getTransport(),
 */
