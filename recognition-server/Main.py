# Main.py
import sys

import cv2
import numpy as np
import os

import DetectChars
import DetectPlates
import PossiblePlate

# module level variables ##########################################################################
SCALAR_BLACK = (0.0, 0.0, 0.0)
SCALAR_WHITE = (255.0, 255.0, 255.0)
SCALAR_YELLOW = (0.0, 255.0, 255.0)
SCALAR_GREEN = (0.0, 255.0, 0.0)
SCALAR_RED = (0.0, 0.0, 255.0)

showSteps = False
error = False
###################################################################################################
def recognise(filePath):

    blnKNNTrainingSuccessful = DetectChars.loadKNNDataAndTrainKNN()         # attempt KNN training

    if blnKNNTrainingSuccessful == False:                               # if KNN training was not successful
        # print "\nerror: KNN traning was not successful\n"   
        # error = True            # show error message
        return -5                                                         # and exit program
    # end if

    imgOriginalScene  = cv2.imread(filePath)               # open image

    if imgOriginalScene is None:                            # if image was not read successfully
        return -2                                             # and exit program
    # end if

    listOfPossiblePlates = DetectPlates.detectPlatesInScene(imgOriginalScene)           # detect plates

    listOfPossiblePlates = DetectChars.detectCharsInPlates(listOfPossiblePlates)        # detect chars in plates

    if len(listOfPossiblePlates) == 0:                          # if no plates were found
        
        return -3            # inform user no plates were found
    else:                                                       # else
        listOfPossiblePlates.sort(key = lambda possiblePlate: len(possiblePlate.strChars), reverse = True)
        licPlate = listOfPossiblePlates[0]
          
        if len(licPlate.strChars) == 0:
            return -4  
    
    return licPlate.strChars
