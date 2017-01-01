export default () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve([{id: 1, name: 'aaaa'}])
      // reject('dadasd')
    }, 500);
  })
}
