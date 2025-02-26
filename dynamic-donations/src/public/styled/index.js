import styled from 'styled-components';

export const Row = styled.div`
  box-sizing: border-box;
  display: flex;
  flex: 0 1 auto;
  flex-direction: ${props => props.reverse ? 'row-reverse' : 'row'};
  flex-wrap: wrap;
  margin-right: -0.5rem;
  margin-left: -0.5rem;
`
