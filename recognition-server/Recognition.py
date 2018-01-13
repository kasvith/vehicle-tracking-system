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

error = False;
###################################################################################################
def recognise(filePath):

    blnKNNTrainingSuccessful = DetectChars.loadKNNDataAndTrainKNN()         # attempt KNN training

    if blnKNNTrainingSuccessful == False:                               # if KNN training was not successful
        # print "\nerror: KNN traning was not successful\n"   
        # error = True            # show error message
        return -1                                                         # and exit program
    # end if

    imgOriginalScene  = cv2.imread(filePath)               # open image

    if imgOriginalScene is None:                            # if image was not read successfully
        #print "\nerror: image not read from file \n\n"
        # error = True
        # #print error      # print error message to std out
        # os.system("pause")                                  # pause so user can see error message
        return -1                                             # and exit program
    # end if

    listOfPossiblePlates = DetectPlates.detectPlatesInScene(imgOriginalScene)           # detect plates

    listOfPossiblePlates = DetectChars.detectCharsInPlates(listOfPossiblePlates)        # detect chars in plates

    cv2.imshow("imgOriginalScene", imgOriginalScene)            # show scene image

    if len(listOfPossiblePlates) == 0:                          # if no plates were found
        # #print "\nno license plates were detected\n"
        # #print error 
        # error = True
        return -1            # inform user no plates were found
    else:                                                       # else
                # if we get in here list of possible plates has at leat one plate

                # sort the list of possible plates in DESCENDING order (most number of chars to least number of chars)
        listOfPossiblePlates.sort(key = lambda possiblePlate: len(possiblePlate.strChars), reverse = True)

                # suppose the plate with the most recognized chars (the first plate in sorted by string length descending order) is the actual plate
        licPlate = listOfPossiblePlates[0]

          
        if len(licPlate.strChars) == 0:                     # if no chars were found in the plate
            # print "\nno characters were detected\n\n"  
            # error = True 
            #print error    # show message
            return -1                                         # and exit program
        

        

        

    return payLoad

# if __name__ == "__recogniton__":
#     recognition()


















