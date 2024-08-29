/* From Uiverse.io by andrew-demchenk0 */ 
.add-btn {
  position: relative;
  width: 150px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 1px solid #4D869C;
  background-color: #4D869C;
}

.add-btn, .add-btn__icon, .add-btn__text {
  transition: all 0.3s;
}

.add-btn .add-btn__text {
  transform: translateX(30px);
  color: #fff;
  font-weight: 600;
}

.add-btn .add-btn__icon {
  position: absolute;
  transform: translateX(109px);
  height: 100%;
  width: 39px;
  background-color: #4D869C;
  display: flex;
  align-items: center;
  justify-content: center;
}

.add-btn .svg {
  width: 30px;
  stroke: #fff;
}

.add-btn:hover {
  background: #4D869C;
}

.add-btn:hover .add-btn__text {
  color: transparent;
}

.add-btn:hover .add-btn__icon {
  width: 148px;
  transform: translateX(0);
}

.add-btn:active .add-btn__icon {
  background-color: #2e8644;
}

.add-btn:active {
  border: 1px solid #2e8644;
}