import Hashids from 'hashids'
const hashids = new Hashids('azowernasdfoia', 5)

export const decodeHashId = (id) => {
  try {
    const ids = hashids.decode(id)
    if (!ids.length) return null
    const num = Number(ids[0])
    if (isNaN(num)) return null
    return num
  } catch (e) {
    console.error(`Failed to decode ${id}`, e)
    return null
  }
}