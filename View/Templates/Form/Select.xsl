<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" version="5.0" encoding="utf-8" indent="yes"
              standalone="yes" omit-xml-declaration="yes"/>

  <xsl:template name="Select">

    <xsl:param name="label"/>
    <xsl:param name="value"/>
    <xsl:param name="name"/>
    <xsl:param name="class"/>
    <xsl:param name="id"/>
    <xsl:param name="placeholder"/>
    <xsl:param name="for"/>
    <xsl:param name="selected"/>


    <xsl:choose>
      <xsl:when test="$id = ''">
        <xsl:variable name="setId">
          <xsl:text>form-</xsl:text>
          <xsl:value-of select="$name"/>
        </xsl:variable>
      </xsl:when>
      <xsl:otherwise>
        <xsl:variable name="setId" select="$id"/>
      </xsl:otherwise>
    </xsl:choose>

    <label class="control-label">
      <xsl:if test="$for != ''">
        <xsl:attribute name="for">
          <xsl:value-of select="$for"/>
        </xsl:attribute>
      </xsl:if>
      <xsl:value-of select="$label"/>
    </label>

    <div class="controls">

      <select>

        <xsl:attribute name="name">
          <xsl:value-of select="$name"/>
        </xsl:attribute>

        <xsl:attribute name="placeholder">
          <xsl:value-of select="$placeholder"/>
        </xsl:attribute>

        <xsl:attribute name="id">
          <xsl:value-of select="setId"/>
        </xsl:attribute>

        <xsl:attribute name="class">
          <xsl:text>error</xsl:text>
          <xsl:value-of select="$class"/>
        </xsl:attribute>

        <xsl:for-each select="value/value">
          <option>
            <xsl:if test="$selected = value">
              <xsl:attribute name="selected">
                <xsl:text>selected</xsl:text>
              </xsl:attribute>
            </xsl:if>
            <xsl:attribute name="value">
              <xsl:value-of select="value"/>
            </xsl:attribute>
            <xsl:value-of select="label"/>
          </option>
        </xsl:for-each>

      </select>

      <xsl:choose>
        <xsl:when test="error = 1">
          <span class="help-inline">
            <strong>
              <xsl:choose>
                <xsl:when test="errorLabel != ''">
                  <xsl:value-of select="errorLabel"/>
                </xsl:when>
                <xsl:otherwise>
                  <xsl:text>Error:</xsl:text>
                </xsl:otherwise>
              </xsl:choose>
            </strong>
            <span class="error-message">
              <xsl:choose>
                <xsl:when test="errorMessage != ''">
                  <xsl:value-of select="errorMessage"/>
                </xsl:when>
                <xsl:otherwise>
                  <xsl:text>This element is required.</xsl:text>
                </xsl:otherwise>
              </xsl:choose>
            </span>
          </span>
        </xsl:when>
        <xsl:when test="description != ''">
          <span class="help-inline">
            <xsl:value-of select="description"/>
          </span>
        </xsl:when>
      </xsl:choose>
    </div>
  </xsl:template>

</xsl:stylesheet>
